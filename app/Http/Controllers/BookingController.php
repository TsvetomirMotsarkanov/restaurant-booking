<?php

namespace App\Http\Controllers;

use Error;

use App\Models\Booking;
use App\Models\BookingConfirmation;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    function show($id, Request $request)
    {
        Validator::make($request->all(), [
            'people' => 'integer|min:1|max:12',
            'date' => 'date',
            'restaurantId' => 'integer',
        ])->validate();

        $date = Carbon::create($request->date);

        if ($date < Carbon::now()) {
            return redirect("/restaurants/" . $id)->with(['result' => 'This restaurant is not available at this time, please try to select different date and time.', 'error' => true]);
        }

        $restaurant = Restaurant::select('name', 'image')->where('id', $id)->first();

        return view("booking.new", [
            'restaurantId' => $id,
            'date' => $request->date,
            'people' => $request->people,
            'restaurantName' => $restaurant->name,
            'restaurantImage' => $restaurant->image
        ]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'people' => 'required|integer|min:1|max:12',
            'date' => 'required|date',
            'restaurantId' => 'required|integer',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
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
            return redirect("/restaurants/" . $request->restaurantId)->with(['result' => 'This restaurant is not available at this time, please try to select different date and time.', 'error' => true]);;
        }


        $result = "";
        $error = false;
        try {
            $tableBookings = $this->getTableBookings($restaurant, $request->people);

            $bookingConfirmation = BookingConfirmation::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'restaurant_id' => $request->restaurantId,
            ]);

            if ($request->newslatter && $request->newslatter === "on") {
                DB::table('subscribers')->insertOrIgnore([
                    'email' => $request->email,
                ]);
            }

            Booking::insert($tableBookings->map(function ($table) use ($date, $bookingConfirmation) {
                return [
                    'restaurant_table_id' => $table->id,
                    'start_date' => $date,
                    'end_date' => Carbon::create($date)->addMinutes(30),
                    'booking_confirmation_id' => $bookingConfirmation->id
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
            throw new Error("This restaurant is not available at this time, please try to select different date and time.");
        }

        return collect($bookings);
    }
}
