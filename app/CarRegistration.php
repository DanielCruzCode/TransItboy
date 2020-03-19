<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CarRegistration extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'car_registrations';

	protected $fillable = ['location', 'carClass', ' brand', 'line', 'model', 'bodywork', 'passengers'];
}
