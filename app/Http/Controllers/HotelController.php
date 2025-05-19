<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->only(['adults', 'children', 'rooms', 'checkin', 'checkout', 'location']);

        $allHotels = [
            [
                'name' => 'Royal Hotel',
                'location' => 'Viyana',
                'available_rooms' => 5,
                'price' => 2750,
                'image' => asset('images/royal.jpg')
            ],
            [
                'name' => 'City Inn',
                'location' => 'Viyana',
                'available_rooms' => 3,
                'price' => 2500,
                'image' => 'images/cityInn.jpg'
            ],
            [
                'name' => 'Hotel Schani',
                'location' => 'Viyana',
                'available_rooms' => 1,
                'price' => 3000,
                'image' => asset('images/schani.jpg')
            ],
            [
                'name' => 'Hilton Park',
                'location' => 'Paris',
                'available_rooms' => 2,
                'price' => 4200,
                'image' => 'https://source.unsplash.com/400x300/?hotel+paris'
            ],
            [
                'name' => 'Grand Hotel',
                'location' => 'Paris',
                'available_rooms' => 3,
                'price' => 3250,
                'image' => asset('images/grand.jpg')
            ],
        ];

        // Filtreleme işlemi
        $hotels = array_filter($allHotels, function ($hotel) use ($data) {
            return empty($data['location']) || $hotel['location'] === $data['location'];
        });

        return view('hotels.result', compact('hotels', 'data'));
    }
    
}


