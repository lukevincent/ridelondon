<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Split extends Model
{
    public $primaryKey = "ride_london_id";

	public $incrementing = false;

    public $timestamps = false;

	public function rider()
	{
		return $this->belongsTo('App\Rider', 'ride_london_id');
	}
}
