<?php

use Illuminate\Database\Seeder;

class RoomRateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RoomRate::create(
            [
              'id' => 1,
              'code' => 'RR001',
              'type_id'=>'1',
              'category' => 'Short Time',
              'hours' => '3',
              'rateperhour'=>'133.33',
              'rate' => '400',
            ]);
        App\RoomRate::create(
            [
              'id' => 2,
              'code' => 'RR002',
              'type_id'=>'2',
              'category' => 'Short Time',
              'hours' => '3',
              'rateperhour'=>'166.66',
              'rate' => '500',
            ]);   
       App\RoomRate::create(
            [
              'id' => 3,
              'code' => 'RR003',
              'type_id'=>'3',
              'category' => 'Short Time',
              'hours' => '3',
              'rateperhour'=>'200',
              'rate' => '600',
            ]); 
          App\RoomRate::create(
              [
                'id' => 4,
                'code' => 'RR004',
                'type_id'=>'1',
                'category' => 'Overnight',
                'hours' => '12',
                'rateperhour'=>'62.5',
                'rate' => '750',
              ]);
          App\RoomRate::create(
              [
                'id' => 5,
                'code' => 'RR005',
                'type_id'=>'2',
                'category' => 'Overnight',
                'rateperhour'=>'87.5',
                'hours' => '12',
                'rate' => '1050',
              ]);   
         App\RoomRate::create(
              [
                'id' => 6,
                'code' => 'RR006',
                'type_id'=>'3',
                'category' => 'Overnight',
                'rateperhour'=>'129.16',
                'hours' => '12',
                'rate' => '1550',
              ]);     
          App\RoomRate::create(
              [
                'id' => 7,
                'code' => 'RR007',
                'type_id'=>'1',
                'category' => 'Stay-In',
                'rateperhour'=>'64.58',
                'hours' => '24',
                'rate' => '1550',
              ]);
          App\RoomRate::create(
              [
                'id' => 8,
                'code' => 'RR008',
                'type_id'=>'2',
                'category' => 'Stay-In',
                'rateperhour'=>'85.41',
                'hours' => '24',
                'rate' => '2050',
              ]);   
         App\RoomRate::create(
              [
                'id' => 9,
                'code' => 'RR009',
                'type_id'=>'3',
                'category' => 'Stay-In',
                'rateperhour'=>'127',
                'hours' => '24',
                'rate' => '3050',
              ]);                
    }
}
