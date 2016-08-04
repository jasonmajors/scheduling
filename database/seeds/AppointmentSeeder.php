<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment')->insert([
        	'first_name' => 'Jason',
        	'last_name'  => 'Majors',
        	'email'      => 'jmajors@mc.com',
        	'start_time' => Carbon::create(2016,07,22, 13, 4, 32)->toDateTimeString(),
        	'end_time'   => Carbon::create(2016,07,22, 13, 5, 32)->toDateTimeString(),
            'day_id'     => 1
        ]);

        DB::table('appointment')->insert([
            'first_name' => 'Jason',
            'last_name'  => 'Majors',
            'email'      => 'jmajors@mc.com',
            'start_time' => Carbon::create(2016,07,24, 13, 3, 32)->toDateTimeString(),
            'end_time'   => Carbon::create(2016,07,24, 13, 4, 32)->toDateTimeString(),
            'day_id'     => 2
        ]);
    }
}
