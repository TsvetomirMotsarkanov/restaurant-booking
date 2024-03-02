<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Restaurant extends Model
{
    use HasFactory;
    protected $with = ['tables'];

    public function scopeAvailable_tables($query)
    {
        $query->whereHas('tables', function ($tablesQuery) {
            $tablesQuery->whereDoesntHave('bookings', function ($bookingsQuery) {
                // TODO
                $bookingsQuery->where('start_date', '<=', Carbon::now());
            });
        });
    }

    public function tables(): HasMany
    {
        return $this->hasMany(RestaurantTable::class);
    }
}
