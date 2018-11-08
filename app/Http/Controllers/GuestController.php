<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Person;
use App\Admission;
use DB;

class GuestController extends Controller{
/* Controller specifically for handling events that don't need a login. -DB */

	//Sends to Awards page -DB
	public function pointsPage(){ 
        return view ('posts.test-search');
    }

    //Uses entry from test-search page to grab firstname, lastname, and number of points -DB
    public function findLID($lid){ 
    	$result = DB::table('people')
    		->select(DB::raw("lid,last_name,first_name"))
    		->where('lid', '=', $lid)
    		->get('lid', 'first_name', 'last_name'); 

    //Filters through the data base by the lid entered and grabs the 5 most recent events and
    //the time the event was started -ZC    
        $pEvent = DB::table('events')
            ->select(DB::raw("events_title,events_start_datetime")) 
            ->leftJoin('admissions', 'events.id', '=', 'admissions.admissions_event_id')
            ->leftJoin('people', 'admissions.admissions_lid', '=', 'people.lid')
            ->where('people.lid', '=', $lid)
            ->where('events_start_datetime', '<=', Now())
            ->limit(5)
            ->orderby('events_start_datetime', 'DESC')
            ->get('events_title','events_start_datetime');

    	return view('posts.test-search', compact('result','pEvent'));
    }


}