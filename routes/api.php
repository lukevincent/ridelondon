<?php

use Illuminate\Http\Request;

Route::get('/finishtimeintervals', 'ApiFinishTimeIntervals@index');

Route::get('/rider/{rider}', 'ApiRider@show');