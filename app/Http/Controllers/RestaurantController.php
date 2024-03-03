<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Contentful\Delivery\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RestaurantController extends Controller
{
    // private $client;

    // public function __construct(Client $client)
    // {
    //     $this->client = $client;
    // }

    public function index()
    {
        $now = Carbon::now();
        $slot1 = $this->addMinutes($now, 15);
        $slot2 = Carbon::create($slot1)->addMinutes(15);
        $slot3 = Carbon::create($slot1)->addMinutes(30);
        $restaurants = Restaurant::with(['tables' => function ($q) use ($slot3) {
            $q->with('bookings')->whereDoesntHave('bookings', function ($bookingsQuery) use ($slot3) {
                $bookingsQuery->where([
                    ['end_date', '>', $slot3],
                ]);
            });
        }])->available_tables($slot3)->get();

        $restaurants->transform(function ($restaurant) use ($slot1, $slot2, $slot3) {
            $restaurant->slots = [
                [
                    "value" => $slot1,
                    "disabled" => !$restaurant->tables->some(function ($table) use ($slot1) {
                        return $table->bookings->count() === 0 || !$table->bookings->some(function ($booking) use ($slot1) {
                            return $booking->end_date > $slot1;
                        });
                    })
                ],
                [
                    "value" => $slot2,
                    "disabled" => !$restaurant->tables->some(function ($table) use ($slot2) {
                        return $table->bookings->count() === 0 || !$table->bookings->some(function ($booking) use ($slot2) {
                            return $booking->end_date > $slot2;
                        });
                    })
                ],
                [
                    "value" => $slot3,
                    "disabled" => !$restaurant->tables->some(function ($table) use ($slot3) {
                        return $table->bookings->count() === 0 || !$table->bookings->some(function ($booking) use ($slot3) {
                            return $booking->end_date > $slot3;
                        });
                    })
                ],
            ];

            return $restaurant;
        });


        return view('restaurant.list', [
            'restaurants' => $restaurants,
            'today' => $now
        ]);
    }

    public function view(Restaurant $restaurant)
    {
        // $entry = $this->client->getEntries();

        // dd($entry);
        return view('restaurant.view', [
            'restaurant' => $restaurant,
        ]);
    }

    private function addMinutes(Carbon $date)
    {
        $rounded = Carbon::create($date)->roundMinute(15);

        if ($rounded <= $date) {
            return Carbon::create($date)->addMinutes(15)->roundMinute(15);
        }

        return $rounded;
    }
}
