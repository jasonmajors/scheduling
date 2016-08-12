<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 	public function run()
    {
        DB::table('days')->insert([
        	'date' => Carbon::create(2016,07,22)->toDateTimeString(),
        	'start_time' => Carbon::create(2016,07,22)->toDateTimeString(),
        	'end_time'   => Carbon::create(2016,07,23)->toDateTimeString(),
        ]);

        DB::table('days')->insert([
        	'date' => Carbon::create(2016,07,24)->toDateTimeString(),
            'start_time' => Carbon::create(2016,07,24)->toDateTimeString(),
            'end_time'   => Carbon::create(2016,07,25)->toDateTimeString(),
        ]);

        DB::table('days')->insert([
        	'date' => Carbon::create(2016,07,01)->toDateTimeString(),
            'start_time' => Carbon::create(2016,07,01,0,0,0)->toDateTimeString(),
            'end_time'   => Carbon::create(2016,07,02,0,0,0)->toDateTimeString(),
        ]);

        DB::table('days')->insert([
            'date' => Carbon::create(2016,07,03)->toDateTimeString(),
            'start_time' => Carbon::create(2016,07,03,0,0,0)->toDateTimeString(),
            'end_time'   => Carbon::create(2016,07,03,0,0,0)->toDateTimeString(),
        ]);
    }
}
