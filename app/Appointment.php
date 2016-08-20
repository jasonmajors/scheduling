<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
 	/**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'appointment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'day_id', 'start_time', 'end_time'];
}
