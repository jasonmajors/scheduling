<?php

namespace App\Repositories;

use App\Day;
use App\Appointment;
use App\Helpers\TimeInterval;
use Carbon\Carbon;

class DayRepository
{
	/**
	* Stores TimeInterval objects for the Day
	* @var array
	*/
	protected $availableTime;


	/**
	* Removes TimeInterval instances where there's a conflicting appointment 
	*
	* @param Day
	* @return array Available time for a given Day object repsented in TimeInveral instances
	*/
	public function getAvailableTime(Day $day)
	{
		$startDateTime = $day->start_time; 
		$endDatetime   = $day->end_time;
		$appointments  = $day->appointments;
		
		$this->availableTime = $this->loadTimeIntervals($startDateTime, $endDatetime);

		if ($appointments) {
			foreach($appointments as $appointment) {
				foreach($this->availableTime as $key => $timeInterval) {
					// Evaluates to true if there's overlap
					if (($appointment->start_time <= $timeInterval->getEnd()) && ($appointment->end_time >= $timeInterval->getStart())) {
						// Destroy the TimeInterval instance
						unset($this->availableTime[$key]);
					}
				}
			}
		}

		return $this->availableTime;
	}


	public function checkAvailability(Day $day, Carbon $apptStart, Carbon $apptEnd) 
	{
		$appointments = $day->appointments;
		foreach ($appointments as $appointment) {
			// Evaluates to true if there's overlap
			if (($appointment->start_time <= $apptEnd) && ($appointment->end_time >= $apptStart)) {
				return false;
			}
		}
		return true;
	}
	/**
	* Loads Day objects that have been created in a given month
	*
	* @param int Month
	* @param int Year
	* @return array Instances of day
	*/
	public function loadDaysInMonth(int $month, int $year)
	{
		$days = Day::whereBetween(
			'start_time', [
			Carbon::create($year, $month, 1,0,0)->startOfMonth(),
			Carbon::create($year, $month, 1,0,0)->endOfMonth()
			]
		)->get();

		return $days;
	}


	/**
	* @todo Decouple from minutes
	*
	* @return array An array of TimeInterval objects
	*/
	private function loadTimeIntervals(Carbon $startDateTime, Carbon $endDateTime, int $increment=1)
	{	
		// Clear previous available times
		$this->availableTime = [];
		// Create new Carbon instance of $startDateTime
		$start = $startDateTime->copy();

		while($start < $endDateTime) {
			// Make new instance so $start isn't incremented before creating a new TimeInterval
			$endOfInterval = $start->copy()->addMinutes($increment);
			$timeInterval = new TimeInterval($start, $endOfInterval);
			$this->availableTime[] = $timeInterval;
			// New instance
			$start = $start->copy()->addMinutes($increment);
		}

		return $this->availableTime;
	}
}