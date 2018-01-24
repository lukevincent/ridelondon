<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rider;
use App\Split;
use DB;
use Cache;

class ApiFinishTimeIntervals extends Controller
{
    public function index()
    {

    	$rider = Rider::findOrFail('999999195DB36C000007AF2D');

    	//$results = DB::select( DB::raw("select finish_time, count(*) as count from riders where event_state = 'finished' and event = '100 Miles' and flagged != true and finish_time != '00:00:00' group by UNIX_TIMESTAMP(finish_time) DIV 60") );
		$results = DB::table('riders')
                     ->select(DB::raw('finish_time, count(*) as total_riders'))
                     ->where([
                     	['event_state', '=', 'finished'],
                     	['event', '=', '100 Miles'],
                     	['flagged', '!=', true],
                     	['finish_time', '!=', '00:00:00'],
                     ])
                     ->groupBy(DB::raw('unix_timestamp(finish_time) DIV 300'))
                     ->get();
		
		$grouped_finish_line_times = DB::table('splits')
                    ->select(DB::raw('time_of_day, count(*) as count'))
					->where([
						['split_name', '=', 'finish'],
						['time_of_day', '!=', '""'],
					])
					->groupBy(DB::raw('UNIX_TIMESTAMP(time_of_day) DIV 600'))
					->get();

		$starttime = DB::table('riders')
                     //->select(DB::raw('bib_number, est_start_time, TIME_TO_SEC(finish_time) as finish_time'))
                     ->select(DB::raw('bib_number, est_start_time, TIME_TO_SEC(finish_time) as finish_time'))
                     ->where([
                     	['event_state', '=', 'finished'],
                     	['event', '=', '100 Miles'],
                     	['flagged', '!=', true],
                     	['finish_time', '!=', '00:00:00'],
                     ])
                     ->whereNotNull('est_start_time')
                     ->orderBy('est_start_time', 'asc')
                     ->get();

		//return $starttime;

        return view('welcome', compact('rider', 'results', 'grouped_finish_line_times', 'starttime'));
    }
}
