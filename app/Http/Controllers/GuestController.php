<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GuestController extends Controller{
	/* Controller specifically for handling events that don't need a login.
	*/
	public function pointsPage(){ //Display point page -DB
        return view ('posts.test-search');
    }
}