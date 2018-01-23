<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rider;
use App\Http\Resources\RiderResource;

class ApiRider extends Controller
{
    public function show(Rider $rider)
    {
    	return new RiderResource($rider);
    }
}
