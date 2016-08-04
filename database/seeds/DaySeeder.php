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
        	'end_time'   => Carbon::create(2016,07,22)->toDateTimeString(),
        ]);

        DB::table('days')->insert([
        	'date' => Carbon::create(2016,07,24)->toDateTimeString(),
            'start_time' => Carbon::create(2016,07,24)->toDateTimeString(),
            'end_time'   => Carbon::create(2016,07,24)->toDateTimeString(),
        ]);
    }
}