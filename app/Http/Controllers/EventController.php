<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //create event form 
    public function create()
    {
        
        $terms = $this->BannerData("Terms"); //Grab terms

        if($terms == false) //if no Term
        {
            return back(); //Return Back
        }

        return view('posts.event-create', compact('terms')); //return event creation page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $term = explode("-",request('eventTerm')); //init term
        $admitStu = in_array("student", request('eventAdmission')) ? "Y" : "N"; //if student then yes
        $admitEmp = in_array("faculty-staff", request('eventAdmission')) ? "Y" : "N";

        //if employee then yes
        $eventStart = date("Y-m-d H:i:s", strtotime(request('eventStart'))); //grab start date
        $eventEnd = date("Y-m-d H:i:s", strtotime(request('eventEnd'))); //grab end date

        //create event
        Event::create([
            'events_dept_id' => \Auth::user()->users_dept_id,
            'events_title' => request('eventTitle'),
            'events_desc' => request('eventDesc'),
            'events_banner_term' => $term[0],
            'events_term' => $term[1],
            'events_start_datetime' => $eventStart,
            'events_end_datetime' => $eventEnd,
            'events_admit_students' => $admitStu,
            'events_admit_employees' => $admitEmp,
            'events_admit_out' => request('eventOut'),
            'events_creation_user_name' => \Auth::user()->name,
            'events_updated_user_name' => \Auth::user()->name]
            //'events_admit_guest' => NULL
        );

        \Session::flash("success", "Event successfuly created.");

        return redirect("/home"); //redirect back to home
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function pastView()
    {
        //grab past events by 10 per page in your department
        $past = Event::where('events_dept_id', \Auth::User()->users_dept_id)
        ->where('events_end_datetime', '<', Carbon::now())
        ->orderBy('events_start_datetime', 'DESC')
        ->orderBy('events_title', 'ASC')
        ->paginate(10);
        
        return view('posts.event-past-view', compact('past')); //return past view
    }

    //search in past view
    public function pastSearch()
    {
        //grab past events
        $past = Event::where('events_dept_id', \Auth::User()->users_dept_id)->where('events_end_datetime', '<', Carbon::now());

       
       
        //if start date
        if(request('start'))
        {
            $past->whereDate('events_start_datetime', request('start'));
        }

        //if end date
        if(request('end'))
        {
            $past->whereDate('events_start_datetime', request('end'));
        }

        //if search
        if(request('search'))
        {
            $past->where('events_title', request('search'));
        }

        //query past events
        $past = $past->orderBy('events_start_datetime', 'DESC')
        ->orderBy('events_title', 'ASC')
        ->paginate(10);

        return view('posts.event-past-view', compact('past')); //return search

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */

    //page for edit event
    public function edit($id) 
    {
        $terms = $this->BannerData("Terms"); //grab terms from banner
        $event = $this->getEvent($id); //get event

        //check department
        if(\Auth::User()->users_dept_id == 1)
        {
            
        }
        elseif($event->events_dept_id != \Auth::User()->users_dept_id)
        {

            \Session::flash('error', 'This event is not owned by your group.');
            return back();
        }

        return view('posts.event-edit', compact('terms', 'event')); //return view for event edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */

    //update chosen event
    public function update($id)
    {

        $term = explode("-",request('eventTerm')); //get term
        $admitStu = in_array("student", request('eventAdmission')) ? "Y" : "N"; //get student checkbox
        $admitEmp = in_array("faculty-staff", request('eventAdmission')) ? "Y" : "N"; //get employee checkbox
        $eventStart = date("Y-m-d H:i:s", strtotime(request('eventStart'))); //get start datetime
        $eventEnd = date("Y-m-d H:i:s", strtotime(request('eventEnd'))); //get end datetime

        //Update Event
        Event::where('id', $id)->update([
            'events_title' => request('eventTitle'),
            'events_desc' => request('eventDesc'),
            'events_banner_term' => $term[0],
            'events_term' => $term[1],
            'events_start_datetime' => $eventStart,
            'events_end_datetime' => $eventEnd,
            'events_admit_students' => $admitStu,
            'events_admit_employees' => $admitEmp,
            'events_admit_out' => request('eventOut'),
            'events_updated_user_name' => \Auth::user()->name]
            //'events_admit_guest' => NULL
        );

        \Session::flash("success", "Event successfuly updated.");

        return back(); //return back
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */

    //soft delete event
    public function destroy($id)
    {
        Event::find($id)->delete(); //soft delete event

        \Session::flash("success", "Event successfuly deleted.");

        return redirect("/home"); //return to home

    }
}
