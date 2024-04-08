<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_table_id', 'booking_confirmation_id', 'start_date', 'end_date'];

    public function table(): BelongsTo
    {
        return $this->belongsTo(RestaurantTable::class);
    }

    public function booking_confirmation(): BelongsTo
    {
        return $this->belongsTo(BookingConfirmation::class);
    }
}
