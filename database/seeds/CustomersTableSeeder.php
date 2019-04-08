<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $customers = [   
        //   ['code' => 'CRS32019001', 'first_name' => 'Peter John','last_name' => 'Casasola','gender' => 'Male'],
        //   ['code' => 'CRS32019002', 'first_name' => 'Michael','last_name' => 'Matias','gender' => 'Male'],
        //   ['code' => 'CRS32019003', 'first_name' => 'Jay Lord','last_name' => 'Cantor','gender' => 'Male'],
        // ];
        // App\Customer::create($customers);

        App\Customer::create([
            'code' => 'TN-1903251',
            'first_name' => 'Michael',
            'last_name' => 'Matias',
            'gender' => 'Male',
            'email' => 'michael.matias@yahoo.com',
        ]);
        App\Customer::create([
            'code' => 'TN-1903252',
            'first_name' => 'Jay lord',
            'last_name' => 'Cantor',
            'gender' => 'Male',
            'email' => 'singletunbigat@yahoo.oo',

        ]);
        App\Customer::create([
            'code' => 'TN-1903253',
            'first_name' => 'Peter John',
            'last_name' => 'Casasola',
            'gender' => 'Male',
            'email' => 'peterjohncasasola14@gmail.com',

        ]);
    }
}


