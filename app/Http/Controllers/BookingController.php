<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    function show(Request $request)
    {
        $date = Carbon::create($request->input("date"));

        if ($date < Carbon::now()) {
            return redirect("/");
        } else {
            return view("booking.new");
        }
    }
}
