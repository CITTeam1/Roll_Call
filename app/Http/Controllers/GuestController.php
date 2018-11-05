<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Person;
use App\Admission;
use DB;

class GuestController extends Controller{
	/* Controller specifically for handling events that don't need a login.
	*/
	public function pointsPage(){ //Display point page -DB
        return view ('posts.test-search');
    }
    //trying to point to the id the user enetered -DB
    public function findLID($lid){ //Returns matching first last and lid.
    	//E.X. http://127.0.0.1:8000/event/pointsPage/findId/L01430811

    	
    	$result = DB::table('people')
    		->select(DB::raw("lid,last_name,first_name"))
    		->where('lid', '=', $lid)
    		->get('lid', 'first_name', 'last_name');

    	
    	
    	return view('posts.test-search', compact('result'));
    //}

}}