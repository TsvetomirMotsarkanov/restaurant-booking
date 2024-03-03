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
        // $restaurants = Restaurant::all();
        $now = Carbon::now();
        $slot1 = $this->addMinutes($now, 15);
        $slot2 = Carbon::create($slot1)->addMinutes(15);
        $slot3 = Carbon::create($slot1)->addMinutes(30);
        $restaurants = Restaurant::with('tables.bookings')->available_tables($slot3)->get();

        return view('restaurant.list', [
            'restaurants' => $restaurants,
            'slots' => [
                [
                    "id" => "slot1",
                    "value" => $slot1
                ],
                [
                    "id" => "slot2",
                    "value" => $slot2
                ],
                [
                    "id" => "slot3",
                    "value" => $slot3
                ],
            ]
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
