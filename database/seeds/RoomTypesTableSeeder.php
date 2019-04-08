<?php

use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RoomType::create(
            [
                'id' => 1,
                'code' => 'RT-001',
                'name' => 'Regular Room',
                'description' => 'Air-Conditioned Room with 1 Bed and Free Wifi',                    
            ]);

        App\RoomType::create(
            [
            'id' => 2,
            'code' => 'RT-002',
            'name' => 'Deluxe Room',
            'description' => 'Air-Conditioned Room with 1 Bed, Smart TV and Free Wifi',
            ]
        );

        App\RoomType::create(
            [
                'id' => 3,
                'code' => 'RT-003',
                'name' => 'Suite Room',
                'description' => 'Air-Conditioned Room with 2 Beds, Smart TV and Free Wifi',
            ]);

           
    }
}
