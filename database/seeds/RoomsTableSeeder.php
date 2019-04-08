<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i = 1;$i <= 5; $i++) {
        //     App\Room::create([
        //         'code' => 'RM-00'.$i,
        //         'name' => 'ROOM-'.$i,
        //         'floor' => rand(1,5),
        //         'type_id' => rand(1,3),
        //         'max_person'=>rand(1,5),
        //         'created_by' => 1,
        //     ]);
        // }

        App\Room::create([
            'id'=>'1',
            'code' => 'RM-1001',
            'name' => 'Catherine',
            'floor' => '1',
            'room_type' => '1',
            'max_person'=>'2',
        ]);


        App\Room::create([
            'id'=>'2',
            'code' => 'RM-1002',
            'name' => 'Rose',
            'floor' => '1',
            'room_type' => '2',
            'max_person'=>'2',
        ]);

        App\Room::create([
            'id'=>'3',
            'code' => 'RM-1003',
            'name' => 'Jade',
            'floor' => '1',
            'room_type' => '2',
            'max_person'=>'2',
        ]);

        App\Room::create([
            'id'=>'4',
            'code' => 'RM-2004',
            'name' => 'Alicia',
            'floor' => '2',
            'room_type' => '3',
            'max_person'=>'4',
        ]);

        App\Room::create([
            'id'=>'5',
            'code' => 'RM-2005',
            'name' => 'Bella',
            'floor' => '2',
            'room_type' => '3',
            'max_person'=>'4',
        ]);
        App\Room::create([
            'id'=>'6',
            'code' => 'RM-2006',
            'name' => 'Theresa',
            'floor' => '2',
            'room_type' => '3',
            'max_person'=>'4',
        ]);


    }
}
