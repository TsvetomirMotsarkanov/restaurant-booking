<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_table_id');
            $table->timestamp('start_date')->default(Carbon::now());
            $table->timestamp('end_date')->default(Carbon::now()->addMinutes(30));
            $table->foreign('restaurant_table_id')->references('id')->on('restaurant_tables');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
