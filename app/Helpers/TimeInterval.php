<?php

namespace App\Helpers;


class TimeInterval
{
	protected $startTime;
	protected $endTime;

	public function __construct($startTime, $endTime)
	{
		$this->startTime = $startTime;
		$this->endTime = $endTime;
	}

	public function getStart()
	{
		return $this->startTime;
	}

	public function getEnd()
	{
		return $this->endTime;
	}
}