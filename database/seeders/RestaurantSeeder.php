<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // unique names
    protected $names = [
        "The Gourmet Garden",
        "Bistro Vue",
        "Cafe L'orangerie",
        "Harbor Dine",
        "Urban Eats",
        "Seafront Tastes",
        "Vintage Kitchen",
        "Skyline Bistro",
        "Meadow Grill",
        "Garden Delights",
    ];

    // unique descriptions
    protected $descriptions = [
        "A delightful escape into the world of culinary excellence, offering an eclectic mix of traditional and contemporary dishes, all made with the freshest local ingredients. The ambiance is enhanced by the thematic decor that transports you to a different world with each visit.",
        "Experience the fusion of art and cuisine in our cozy bistro, where every dish tells a story. Our menu is a tapestry of flavors, crafted with care to delight your senses. The intimate setting is perfect for those special moments that deserve more than just good food.",
        "Indulge in the harmonious blend of comfort and sophistication at our cafe, where every bite is a testament to our passion for quality. From our signature coffee blends to our exquisite pastries, everything is made to perfection.",
        "Enjoy the freshest seafood and breathtaking views at our seaside eatery. Our chefs pride themselves on creating dishes that reflect the bounty of the sea, served in a relaxed atmosphere where every meal feels like a getaway.",
        "Step into our urban sanctuary of flavors, where the city's hustle and bustle fades away the moment you take the first bite. Our menu is a celebration of street food from around the world, reimagined with a gourmet twist.",
        "Savor the taste of the oceanfront with our selection of seafood and grill specialties. Our restaurant is the perfect spot for a leisurely meal, accompanied by the soothing sounds of the waves.",
        "Relive the charm of yesteryears with our vintage-themed kitchen, where every dish is a nod to the classics, reinvented with a modern flair. Our cozy ambiance makes for a perfect backdrop for a nostalgic dining experience.",
        "Dine above the clouds at our skyline bistro, where the view is just as stunning as the food. Our menu features a blend of international cuisines, each dish crafted to match the breathtaking panorama.",
        "Enjoy the rustic flavors of the countryside at our grill, where we use the freshest farm-to-table ingredients to bring you hearty and wholesome meals. Our open kitchen allows you to witness the magic as it happens.",
        "Escape to our garden oasis, where we offer a tranquil dining experience amidst lush greenery. Our menu is inspired by nature, with each dish crafted to reflect the season's best.",
    ];

    public function run(): void
    {
        foreach ($this->names as $key => $value) {
            Restaurant::factory()->create([
                'name' => $value,
                'description' => $this->descriptions[$key],
            ]);
        }
    }
}
