<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the applsication dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check user
        if(\Auth::User()->users_dept_id == NULL)
        {
            \Session::flash('warning', 'Computer Services must assign a department to your account for continue use.');

            return view('posts.message');//return message post
        }

        $dept_id = (string) \Auth::user()->users_dept_id; //get department id
    
        $dept = DB::table("RollCall.groups")->where('dept_id', '=', $dept_id)->first(); //grab department info

        //get current event
        $current = Event::where('events_dept_id', $dept_id)
        ->where('events_start_datetime','<=', Carbon::now())
        ->where('events_end_datetime', '>=', Carbon::now())
        ->orderBy('events_title', 'DESC')->orderBy('events_start_datetime', 'DESC')
        ->orderBy('events_title', 'ASC')
        ->get(); 

        //get upcoming events
        $upcoming = Event::where('events_dept_id', $dept_id)
        ->where('events_start_datetime','>', Carbon::now())
        ->orderBy('events_start_datetime', 'DESC')
        ->orderBy('events_title', 'DESC')
        ->get();

        //get past events
        $past = Event::where('events_dept_id', $dept_id)
        ->where('events_end_datetime', '<', Carbon::now())
        ->orderBy('events_start_datetime', 'ASC')
        ->orderBy('events_title', 'ASC')
        ->paginate(10);

        return view('home', compact('dept', 'current', 'upcoming', 'past')); //return home view
    }
}
