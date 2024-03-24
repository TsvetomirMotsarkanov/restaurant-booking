<?php

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
        Schema::table('restaurants', function (Blueprint $table) {
            $table->decimal('raiting')->default(0.0);
            $table->integer('additional_info_price')->default(3);
            $table->string('image');
            $table->string('additional_info_area')->nullable();
            $table->string('additional_info_location')->nullable();
            $table->string('additional_info_hours_of_operation')->nullable();
            $table->string('additional_info_cuisines')->nullable();
            $table->string('additional_info_dining_style')->nullable();
            $table->string('additional_dress_code')->nullable();
            $table->string('additional_parking_details')->nullable();
            $table->string('additional_payment_options')->nullable();
            $table->string('additional_executive_chef')->nullable();
            $table->string('additional_phone_number')->nullable();
            $table->string('additional_website')->nullable();
            $table->string('additional_menu')->nullable();
            $table->string('additional_private_party_facilities')->nullable();
            $table->string('additional_smoking_area')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn([
                'raiting',
                'image',
                'additional_info_area',
                'additional_info_location',
                'additional_info_hours_of_operation',
                'additional_info_price',
                'additional_info_cuisines',
                'additional_info_dining_style',
                'additional_dress_code',
                'additional_parking_details',
                'additional_payment_options',
                'additional_executive_chef',
                'additional_phone_number',
                'additional_website',
                'additional_menu',
                'additional_private_party_facilities',
                'additional_smoking_area',
            ]);
        });
    }
};
