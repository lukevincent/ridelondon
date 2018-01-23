<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
	public $primaryKey = "ride_london_id";
    
    public $incrementing = false;
    
    public $timestamps = false;

    public function splits()
    {
        return $this->hasMany('App\Split', 'ride_london_id');
    }
}
