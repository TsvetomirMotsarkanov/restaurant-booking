<?php

namespace Database\Seeders;

use App\Models\BookingConfirmation;
use Illuminate\Database\Seeder;

class BookingConfirmationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookingConfirmation::factory(125)->create();
    }
}
