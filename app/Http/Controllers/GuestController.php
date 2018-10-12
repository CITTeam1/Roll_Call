<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Person;

class GuestController extends Controller{
	/* Controller specifically for handling events that don't need a login.
	*/
	public function pointsPage(){ //Display point page -DB
        return view ('posts.test-search');
    }
    //trying to point to the id the user enetered -DB
    public function findLID($lid){

    	$id = Request::get('admitId');

    	$result = DB::table('people')
    		->select(DB::raw("*"))
    		->where('lid', '=', $id)
    		->get();


    	//$id = $this->getEvent($id);
    	return view('posts.test-search', $id);
    //}
}}