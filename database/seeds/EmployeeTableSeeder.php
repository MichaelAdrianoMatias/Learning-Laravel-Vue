<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Employee::create(
            [
              'id' => 1,
              'employeeno' => 'ID-001',
              'firstname' => 'Adrian Paul',
              'middlename' => 'Adriano',
              'lastname' => 'Matias',
              'address' => 'Liwanag, Tumauini, Isabela',
              'contact' => '0986 998 1243',
              'email' => 'adrian.matias@yahoo.com',
              'position' => 'Gasoline Boy',
            ]);

             App\Employee::create(
            [
              'id' => 2,
              'employeeno' => 'ID-002',
              'firstname' => 'Rose Marie',
              'middlename' => 'Ido',
              'lastname' => 'Matias',
              'address' => 'Liwanag, Tumauini, Isabela',
              'contact' => '0990 876 2341',
              'email' => 'rosemarieido@yahoo.com',
              'position' => 'House Keeping',
            ]);

             App\Employee::create(
            [
              'id' => 3,
              'employeeno' => 'ID-003',
              'firstname' => 'Josh',
              'middlename' => 'Carbonel',
              'lastname' => 'Cruz',
              'address' => 'Balug, Tumauini, Isabela',
              'contact' => '0991 234 5243',
              'email' => 'carbonel1234@yahoo.com',
              'position' => 'Gasoline Boy',
            ]);
    }
}
