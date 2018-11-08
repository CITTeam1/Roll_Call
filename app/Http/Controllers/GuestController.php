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
    		->select(DB::raw("lid, points,last_name,first_name"))
    		->where('lid', '=', $lid)
    		->get('points', 'first_name', 'last_name');    	
    	return view('posts.test-search', compact('result'));
}}