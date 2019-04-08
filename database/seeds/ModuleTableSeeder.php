<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Module::create(
        [
          'id' => 1,
          'title' => 'Dashboard',
          'url' => 'home.index',
          'description' => 'Main Page of the System.',
          'parent_id' => 0,
          'order' => 0,
          'icon' => 'fa fa-dashboard',
        ]);


          //  App\Module::create(
          // [
          //   'id' => 2,
          //   'title' => 'Hotel Floors',
          //   'url' => '',
          //   'description' => 'Floor Description',
          //   'parent_id' => 0,
          //   'order' => 1,
          //   'icon' => 'fa fa-h-square',
          // ]);
          // App\Module::create(
          //   [
          //     'id' => 3,
          //     'title' => 'New Floor',
          //     'url' => '',
          //     'description' => 'Register New Floor',
          //     'parent_id' => 2,
          //     'order' => 1,
          //     'icon' => 'fa fa-plus-circle',
          //   ]);
          //   App\Module::create(
          //     [
          //       'id' => 4,
          //       'title' => 'All Floor',
          //       'url' => '',
          //       'description' => 'View All Floors',
          //       'parent_id' => 2,
          //       'order' => 2,
          //       'icon' => 'fa  fa-list-ol',
          //     ]);



          App\Module::create(
            [
              'id' => 5,
              'title' => 'Room Management',
              'url' => '',
              'description' => 'Room Information',
              'parent_id' => 0,
              'order' => 1,
              'icon' => 'fa fa-building',
            ]);
            App\Module::create(
              [
                'id' => 6,
                'title' => 'New Room',
                'url' => 'room.create',
                'description' => 'Register New Room',
                'parent_id' => 5,
                'order' => 1,
                'icon' => 'fa fa-plus-circle',
              ]);
              App\Module::create(
                [
                  'id' => 7,
                  'title' => 'New Room Type',
                  'url' => 'roomtype.create',
                  'description' => 'Create New Room type',
                  'parent_id' => 5,
                  'order' => 2,
                  'icon' => 'fa fa-plus-circle',
                ]);
                App\Module::create(
                  [
                    'id' => 8,
                    'title' => 'New Amenities',
                    'url' => 'amenities.create',
                    'description' => 'Create New Amenities',
                    'parent_id' => 5,
                    'order' => 4,
                    'icon' => 'fa fa-plus-circle',
                  ]);

                App\Module::create(
                  [
                    'id' => 9,
                    'title' => 'View Rooms',
                    'url' => 'room.index',
                    'description' => 'View All Rooms',
                    'parent_id' => 5,
                    'order' => 6,
                    'icon' => 'fa  fa-hotel (alias)',
                  ]);
                  App\Module::create(
                    [
                      'id' => 10,
                      'title' => 'Room Types',
                      'url' => 'roomtype.index',
                      'description' => 'View All Room Types',
                      'parent_id' => 5,
                      'order' => 8,
                      'icon' => 'fa  fa-list-alt',
                    ]);
                    App\Module::create(
                      [
                        'id' => 11,
                        'title' => 'Amenities ',
                        'url' => 'amenities.index',
                        'description' => 'View All Amenities',
                        'parent_id' => 5,
                        'order' => 9,
                        'icon' => 'fa  fa-gears (alias)',
                      ]);


            App\Module::create(
              [
                'id' => 12,
                'title' => 'Employee',
                'url' => '',
                'description' => 'Employee Information',
                'parent_id' => 0,
                'order' => 1,
                'icon' => 'fa fa-users',
              ]);
                App\Module::create(
                  [
                    'id' => 13,
                    'title' => 'New Employee',
                    'url' => 'employee.create',
                    'description' => 'Register New Employee',
                    'parent_id' => 12,
                    'order' => 1,
                    'icon' => 'fa fa-plus-circle',
                  ]);

                App\Module::create(
                  [
                    'id' => 14,
                    'title' => 'Employee',
                    'url' => 'employee.index',
                    'description' => 'View All Employee Information',
                    'parent_id' => 12,
                    'order' => 2,
                    'icon' => 'fa  fa-list-alt',
                  ]);

              App\Module::create(
                [
                  'id' => 15,
                  'title' => 'Customer',
                  'url' => '',
                  'description' => 'Customer Information',
                  'parent_id' => 0,
                  'order' => 1,
                  'icon' => 'fa fa-user-secret',
                ]);
                    App\Module::create(
                      [
                        'id' => 16,
                        'title' => 'New Customer',
                        'url' => 'customer.create',
                        'description' => 'Register New Customer',
                        'parent_id' => 15,
                        'order' => 1,
                        'icon' => 'fa fa-plus-circle',
                      ]);

                    App\Module::create(
                      [
                        'id' => 17,
                        'title' => 'All Customer',
                        'url' => 'customer.index',
                        'description' => 'View All Customer Information',
                        'parent_id' => 15,
                        'order' => 2,
                        'icon' => 'fa  fa-list-alt',
                      ]);

                      App\Module::create(
                        [
                          'id' => 18,
                          'title' => 'Booking',
                          'url' => '',
                          'description' => 'Booking Management',
                          'parent_id' => 0,
                          'order' => 1,
                          'icon' => 'fa fa-book',
                        ]);
                            App\Module::create(
                              [
                                'id' => 19,
                                'title' => 'Book a room',
                                'url' => '',
                                'description' => 'Create new Booking',
                                'parent_id' => 18,
                                'order' => 1,
                                'icon' => 'fa fa-plus-circle',
                              ]);
                              App\Module::create(
                                [
                                  'id' => 20,
                                  'title' => 'Set CheckIn/Out Time',
                                  'url' => '',
                                  'description' => 'Set CheckIn/Out of Customer',
                                  'parent_id' => 18,
                                  'order' => 2,
                                  'icon' => 'fa fa-calendar-plus-o',
                                ]);
                            App\Module::create(
                              [
                                'id' => 21,
                                'title' => 'Booked',
                                'url' => '',
                                'description' => 'View Customer',
                                'parent_id' => 18,
                                'order' => 3,
                                'icon' => 'fa  fa-list-alt',
                              ]);
                              App\Module::create(
                                [
                                  'id' => 22,
                                  'title' => 'Task',
                                  'url' => '',
                                  'description' => 'Task Management',
                                  'parent_id' => 0,
                                  'order' => 1,
                                  'icon' => 'fa fa fa-calendar',
                                ]);
                                    App\Module::create(
                                      [
                                        'id' => 23,
                                        'title' => 'Assign Tasks',
                                        'url' => '',
                                        'description' => 'Create New Tasks',
                                        'parent_id' => 22,
                                        'order' => 1,
                                        'icon' => 'fa fa-flag-o',
                                      ]);
                                      App\Module::create(
                                        [
                                          'id' => 24,
                                          'title' => 'Your Task',
                                          'url' => '',
                                          'description' => 'User Task',
                                          'parent_id' => 22,
                                          'order' => 2,
                                          'icon' => 'fa fa-calendar',
                                        ]);
                App\Module::create(
                  [
                    'id' => 25,
                    'title' => 'Help',
                    'url' => '',
                    'description' => 'HIMSElite Information',
                    'parent_id' => 0,
                    'order' => 1,
                    'icon' => 'fa fa-info-circle',
                  ]);
                  App\Module::create(
                    [
                      'id' => 26,
                      'title' => 'About Hotel',
                      'url' => '',
                      'description' => 'Hotel Information',
                      'parent_id' => 25,
                      'order' => 1,
                      'icon' => 'fa fa-info-circle',
                    ]);

                  App\Module::create(
                    [
                      'id' => 27,
                      'title' => 'About HIMSElite',
                      'url' => '',
                      'description' => 'System Information',
                      'parent_id' => 25,
                      'order' => 2,
                      'icon' => 'fa fa-info-circle',
                    ]);
                    App\Module::create(
                      [
                        'id' => 28,
                        'title' => 'About Developers',
                        'url' => '',
                        'description' => 'Developers Information',
                        'parent_id' => 25,
                        'order' => 3,
                        'icon' => 'fa fa-info-circle',
                      ]);
                      //Room Management
                      App\Module::create(
                        [
                          'id' => 29,
                          'title' => 'Add Room Rate',
                          'url' => 'roomrate.create',
                          'description' => 'Create New Room Rate',
                          'parent_id' => 5,
                          'order' => 3,
                          'icon' => 'fa fa-plus-circle',
                        ]);
                        App\Module::create(
                          [
                            'id' => 30,
                            'title' => 'View Room Rate',
                            'url' => 'roomrate.index',
                            'description' => 'View All Room Rates',
                            'parent_id' => 5,
                            'order' => 7,
                            'icon' => 'fa fa-money',
                          ]);
                          //room amenities
                          App\Module::create(
                            [
                              'id' => 31,
                              'title' => 'Add Room Amenities',
                              'url' => 'roomamenities.create',
                              'description' => 'Add Room Amenities',
                              'parent_id' => 5,
                              'order' => 5,
                              'icon' => 'fa fa-plus-circle',
                            ]);
                            App\Module::create(
                              [
                                'id' => 32,
                                'title' => 'View Room Amenities',
                                'url' => 'roomamenities.index',
                                'description' => 'View Room Amenities',
                                'parent_id' => 5,
                                'order' => 10,
                                'icon' => 'fa fa-sitemap',
                              ]);
      //   App\Module::create(
      //     
      //       'id' => 2,
      //       'title' => 'Customers',
      //       'url' => 'customer.index',
      //       'description' => '',
      //       'parent_id' => 0,
      //       'order' => 1,
      //       'icon' => '',
      //     ]);
      //   App\Module::create(
      //     [
      //       'id' => 3,
      //       'title' => 'Hotel Management',
      //       'url' => '',
      //       'description' => '',
      //       'parent_id' => 0,
      //       'order' => 1,
      //       'icon' => '',
      //     ]);
      //     App\Module::create(
      //       [
      //         'id' => 4,
      //         'title' => 'Room Type',
      //         'url' => 'roomtype.index',
      //         'description' => '',
      //         'parent_id' => 3,
      //         'order' => 1,
      //         'icon' => 'fa fa-circle-o',
      //       ]);

      //       App\Module::create(
      //         [
      //           'id' => 5,
      //           'title' => 'Rooms',
      //           'url' => 'room.index',
      //           'description' => '',
      //           'parent_id' => 3,
      //           'order' => 2,
      //           'icon' => 'fa fa-circle-o',
      //       ]);

      //       App\Module::create(
      //         [
      //           'id' => 6,
      //           'title' => 'Rooms',
      //           'url' => 'room.index',
      //           'description' => '',
      //           'parent_id' => 3,
      //           'order' => 2,
      //           'icon' => 'fa fa-circle-o',
      //       ]); 
      //     App\Module::create(
      //       [
      //         'id' => 6,
      //         'title' => 'Room Amenities',
      //         'url' => 'room_amenities.index',
      //         'description' => '',
      //         'parent_id' => 3,
      //         'order' => 3,
      //         'icon' => 'fa fa-circle-o',
      //       ]);
          
    }
}  