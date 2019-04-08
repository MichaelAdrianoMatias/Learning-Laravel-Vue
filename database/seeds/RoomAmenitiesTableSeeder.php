<?php

use Illuminate\Database\Seeder;

class RoomAmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RoomAmenities::create([
            'id'=>'1',
            'room_id' => '1',
            'amenity_id' => '1',
            'quantity' => '2',
            'additional' => 'Allocated',
            'cost'=>'0.00',
        ]);
        App\RoomAmenities::create([
            'id'=>'2',
            'room_id' => '1',
            'amenity_id' => '2',
            'quantity' => '2',
            'additional' => 'Allocated',
            'cost'=>'0.00',
        ]);
        App\RoomAmenities::create([
            'id'=>'3',
            'room_id' => '1',
            'amenity_id' => '3',
            'quantity' => '1',
            'additional' => 'Allocated',
            'cost'=>'0.00',
        ]);
        App\RoomAmenities::create([
            'id'=>'4',
            'room_id' => '1',
            'amenity_id' => '1',
            'quantity' => '1',
            'additional' => 'Barrowed',
            'cost'=>'150',
        ]);
    }
}
