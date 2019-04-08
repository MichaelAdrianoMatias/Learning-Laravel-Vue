<?php

use Illuminate\Database\Seeder;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Amenities::create(
            [
              'id' => 1,
              'code' => 'RA-001',
              'name' => 'Bath Towel',
              'quantity' =>'0',
              'totalquantity'=>'5',
              'barrowedcost'=>'150.00',
              'damagedcost'=>'200.00',

            ]);

            App\Amenities::create(
              [
                'id' => 2,
                'code' => 'RA-002',
                'name' => 'Pillow',
                'quantity' =>'0',
                'totalquantity'=>'10',
                'barrowedcost'=>'150.00',
                'damagedcost'=>'200.00',
  
              ]);
              App\Amenities::create(
                [
                  'id' => 3,
                  'code' => 'RA-003',
                  'name' => 'Bedsheet',
                  'quantity' =>'0',
                  'totalquantity'=>'6',
                  'barrowedcost'=>'250.00',
                  'damagedcost'=>'400.00',
    
                ]);
                App\Amenities::create(
                  [
                    'id' => 4,
                    'code' => 'RA-004',
                    'name' => 'Blanket',
                    'quantity' =>'0',
                    'totalquantity'=>'10',
                    'barrowedcost'=>'200.00',
                    'damagedcost'=>'400.00',
      
                  ]);
    }
}
