<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //  int $width = 640,
    //  int $height = 480,
    //  echo $faker->imageUrl(640, 480, 'animals', true);

    private $additional_smoking_area = [
        "Outdoor Smoking Zone",
        "Designated Smoking Terrace",
        "Indoor Smoking Lounge",
        "No Smoking Allowed",
        "Outdoor Smoking Patio",
        "No Smoking",
        "Designated Smoking Area",
        "Outdoor Smoking Terrace",
        null
    ];

    private $additional_info_hours_of_operation = [
        "Mon-Thu 11:00-23:00, Fri-Sat 11:00-00:00, Sun 12:00-22:00", "Mon-Fri 09:00-22:00, Sat-Sun 10:00-23:00",
        "Tue-Sun 10:00-22:00, Closed on Mondays", "Daily 07:00-23:00", "Mon-Wed 10:00-19:00, Thu-Sat 10:00-21:00, Sun 11:00-18:00",
        "Mon-Sat 11:00-22:00",
        "Tue-Sun 12:00-23:00",
        "Mon-Sat 12:00-22:00",
        "Mon-Sun 11:00-21:00",
        "Mon-Sun 11:00-22:00",
        "Mon-Fri 08:00-18:00, Sat-Sun 09:00-17:00",
        "Tue-Sun 12:00-22:00",
        "Mon-Sun 11:30-22:30",
        "Mon-Sun 08:00-20:00",
        "Tue-Sun 17:00-23:00",
        null
    ];

    private $additional_info_cuisines = [
        "International Fusion",
        "Indian Fusion",
        "Japanese Fusion",
        "Italian",
        "American",
        "Café, Coffee",
        "Thai",
        "Mediterranean",
        "French, Bakery",
        "Seafood, Grill",
    ];

    private $additional_info_dining_style = [
        null,
        "Casual Dining",
        "Fine Dining",
        "Casual Elegant",
        "Fast Casual",
        "Casual",
    ];

    private $additional_dress_code = [
        null,
        "Casual",
        "Smart Casual",
        "Business Casual",
    ];

    private $additional_parking_details = [
        null,
        "Limited street parking available nearby.",
        "Valet parking available.",
        "Public parking garage nearby.",
        "Street parking available.",
        "Parking available in nearby lot.",
        "Limited street parking available.",
        "Street parking available nearby.",
    ];

    private $additional_payment_options = [
        null,
        "Visa, Mastercard, Cash",
        "AMEX, Visa, Mastercard",
        "Visa, Mastercard, Apple Pay",
        "Visa, Mastercard, AMEX",
    ];

    private $additional_private_party_facilities = [
        null,
        "Host your special events with us and enjoy personalized service in a charming atmosphere.",
        "Celebrate your special occasions with us in our elegant private dining spaces.",
        "Host your private events with us and enjoy tailored menus and impeccable service.",
        "Host your events with us and enjoy customizable menus and a relaxed atmosphere.",
        "We offer private event bookings for intimate gatherings and celebrations.",
        "We offer private dining options for special occasions, tailored to your needs.",
        "We offer custom cake orders and catering for events.",
        "Host your events with us and enjoy personalized menus and attentive service.",
    ];

    public function definition(): array
    {
        return [
            'name' => fake()->streetName(),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(300, 300),
            'raiting' => fake()->randomFloat(1, 0, 5),
            'additional_info_area' => "London",
            'additional_info_location' => fake()->streetAddress(),
            'additional_smoking_area' => $this->additional_smoking_area[fake()->numberBetween(0, count($this->additional_smoking_area) - 1)],
            'additional_info_hours_of_operation' => $this->additional_info_hours_of_operation[fake()->numberBetween(0, count($this->additional_info_hours_of_operation) - 1)],
            'additional_info_price' => fake()->numberBetween(1, 4),
            'additional_info_cuisines' => $this->additional_info_cuisines[fake()->numberBetween(0, count($this->additional_info_cuisines) - 1)],
            'additional_executive_chef' => fake()->firstName() . ' ' . fake()->lastName(),
            'additional_phone_number' => fake()->phoneNumber(),
            'additional_website' => fake()->url(),
            'additional_menu' => fake()->url(),
            'additional_info_dining_style' => $this->additional_info_dining_style[fake()->numberBetween(0, count($this->additional_info_dining_style) - 1)],
            'additional_dress_code' => $this->additional_dress_code[fake()->numberBetween(0, count($this->additional_dress_code) - 1)],
            'additional_parking_details' => $this->additional_parking_details[fake()->numberBetween(0, count($this->additional_parking_details) - 1)],
            'additional_payment_options' => $this->additional_payment_options[fake()->numberBetween(0, count($this->additional_payment_options) - 1)],
            'additional_private_party_facilities' => $this->additional_private_party_facilities[fake()->numberBetween(0, count($this->additional_private_party_facilities) - 1)],
        ];
    }
}
