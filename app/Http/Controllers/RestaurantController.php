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
        $hours = $this->getHours($now);
        $peopleOptions = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $people = 2;
        $restaurantName = '';
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
            'date' => $now,
            'now' => $now,
            'hours' => $hours,
            'peopleOptions' => $peopleOptions,
            'people' => $people,
            'restaurantName' => $restaurantName
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

    private function getHours($now)
    {
        $periods = [];
        $hourNow = $this->addMinutes($now, 30);
        while ($now->format('m-d') === $hourNow->format('m-d')) {
            $periods[] = $hourNow->format('H:i');
            $hourNow->addMinutes(30);
        }

        return $periods;
    }

    private function addMinutes(Carbon $date, $minutes = 15)
    {
        $rounded = Carbon::create($date)->roundMinute($minutes);

        if ($rounded <= $date) {
            return Carbon::create($date)->addMinutes($minutes)->roundMinute($minutes);
        }

        return $rounded;
    }
}
