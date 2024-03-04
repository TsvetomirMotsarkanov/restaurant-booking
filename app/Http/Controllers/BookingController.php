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

        $restaurant = Restaurant::with(['tables' => function ($q) use ($request) {
            $q->whereDoesntHave('bookings', function ($bookingsQuery) use ($request) {
                $bookingsQuery->where([
                    ['end_date', '>', $request->date],
                ]);
            });
        }])->available_tables($request->date)->find($request->restaurantId);

        if (!$restaurant) {
            return redirect('/');
        }


        $result = "";
        $error = false;
        try {
            $tableBookings = $this->getTableBookings($restaurant, $request->people);

            Booking::insert($tableBookings->map(function ($table) use ($date) {
                return [
                    'restaurant_table_id' => $table->id,
                    'start_date' => $date,
                    'end_date' => Carbon::create($date)->addMinutes(30)
                ];
            })->toArray());

            $result = "You successfully created your booking.";
        } catch (Error $e) {
            $error = true;
            $result = $e->getMessage();
        }

        return redirect("/")->with(["result" => $result, 'error' => $error]);
    }

    private function getTableBookings($restaurant, $people)
    {
        $bookings = [];
        $filledSeats = 0;
        $table = $restaurant->tables->firstWhere('seats', '=', $people);

        if ($table) {
            return collect([$table]);
        }

        $sortedTables = $restaurant->tables->sortByDesc('seats');
        foreach ($sortedTables as $table) {
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
