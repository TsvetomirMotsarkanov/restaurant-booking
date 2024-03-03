<?php

namespace App\Http\Controllers;

use Error;

use App\Models\Booking;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    function show($id, Request $request)
    {
        $date = Carbon::create($request->date);

        if ($date < Carbon::now()) {
            return redirect("/");
        }

        return view("booking.new", [
            'restaurantId' => $id,
            'date' => $request->date
        ]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'people' => 'required|integer|min:1|max:12',
            'date' => 'required|date',
            'restaurantId' => 'required|integer',
        ])->validate();

        $date = Carbon::create($request->date);
        if ($date < Carbon::now()) {
            return redirect()->back();
        }

        $restaurant = Restaurant::findOr($request->restaurantId, function () {
            return redirect()->back();
        });

        $result = "";
        try {
            $tableBookings = $this->getTableBookings($restaurant, $request->people);

            Booking::insert($tableBookings->map(function ($table) use ($date) {
                return [
                    'restaurant_table_id' => $table->id,
                    'start_date' => $date,
                    'end_date' => Carbon::create($date)->addMinutes(30)
                ];
            })->toArray());

            $result = "Success!";
        } catch (Error $e) {
            $result = $e->getMessage();
        }

        return redirect("/")->with("result", $result);
    }

    private function getTableBookings($restaurant, $people)
    {
        $bookings = [];
        $filledSeats = 0;
        foreach ($restaurant->tables as $table) {
            $bookings[] = $table;
            $filledSeats += $table->seats;

            if ($filledSeats >= $people) {
                return collect($bookings);
            }
        }

        if ($filledSeats < $people) {
            throw new Error("Not enough seats");
        }

        return collect($bookings);
    }
}