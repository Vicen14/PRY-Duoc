<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'name' => 'Standard Room',
            'description' => 'A comfortable room with basic amenities.',
            'price' => 100.00,
            'price_per_night' => 120.00,
            'capacity' => 2,
            'room_number' => 101,
            'location' => 'First Floor',
            'characteristics' => 'Spacious and well-lit.',
            'equipment' => 'TV, Wi-Fi, Mini-bar.',
            'room_type' => 'Turista',
            'status' => 'disponible',
        ]);

        Room::create([
            'name' => 'Deluxe Room',
            'description' => 'A spacious room with premium amenities.',
            'price' => 200.00,
            'price_per_night' => 240.00,
            'capacity' => 4,
            'room_number' => 102,
            'location' => 'Second Floor',
            'characteristics' => 'Spacious and well-lit.',
            'equipment' => 'TV, Wi-Fi, Mini-bar.',
            'room_type' => 'Turista',
            'status' => 'disponible',
        ]);

        Room::create([
            'name' => 'Suite',
            'description' => 'A luxurious suite with top-notch facilities.',
            'price' => 500.00,
            'price_per_night' => 600.00,
            'capacity' => 6,
            'room_number' => 103,
            'location' => 'Third Floor',
            'characteristics' => 'Spacious and well-lit.',
            'equipment' => 'TV, Wi-Fi, Mini-bar.',
            'room_type' => 'Turista',
            'status' => 'disponible',
        ]);
    }
}