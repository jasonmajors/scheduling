<?php

namespace App\Repositories;

use App\Day;
use App\Helpers\TimeInterval;
use Carbon\Carbon;

class DayRepository
{
	protected $availableTime = [];


	/**
	* 
	* @param Day
	* @return array Available time for a given Day object
	*/
	public function availableTime(Day $day)
	{
		$startDateTime = $day->start_time; 
		$endDatetime   = $day->end_time;
		
		// day end
		// appointments
		$appointments = $day->appointments;

		foreach($appointments as $appointment) {
			//
		}
	}

	public static function loadTimeIntervals(Carbon $startDateTime, Carbon $endDateTime, int $increment)
	{	
		$availableTime = [];
		// Create new Carbon instance of $startDateTime
		$start = $startDateTime->copy();

		while($start < $endDateTime) {
			// @todo Need to be able to change the unit of increment
			// Need new instance so $start isn't incremented before creating a new TimeInterval
			$endOfInterval = $start->copy()->addMinutes($increment);
			$timeInterval = new TimeInterval($start, $endOfInterval);
			$availableTime[] = $timeInterval;
			$start = $start->copy()->addMinutes($increment);
		}

		return $availableTime;
	}
}