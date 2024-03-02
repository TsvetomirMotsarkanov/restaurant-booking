<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Contentful\Delivery\Client;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // private $client;

    // public function __construct(Client $client)
    // {
    //     $this->client = $client;
    // }

    public function index()
    {
        // $restaurants = Restaurant::with("tables")->get();

        $restaurants = Restaurant::all();
        // $restaurants = Restaurant::latest()->available_tables()->get();

        return view('restaurant.list', [
            'restaurants' => $restaurants,
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
}
