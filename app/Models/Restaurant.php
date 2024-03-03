<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Restaurant extends Model
{
    use HasFactory;

    public function scopeAvailable_tables($query, $bookingDate)
    {
        $query->whereHas('tables', function ($tablesQuery) use ($bookingDate) {
            $tablesQuery->whereDoesntHave('bookings', function ($bookingsQuery) use ($bookingDate) {
                $bookingsQuery->where([
                    ['start_date', '<=', $bookingDate],
                    ['end_date', '>', $bookingDate],
                ]);
            });
        });
    }

    public function tables(): HasMany
    {
        return $this->hasMany(RestaurantTable::class);
    }
}
