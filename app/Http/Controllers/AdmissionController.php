<?php

namespace App\Http\Controllers;

use App\Event;
use App\Person;
use App\Admission;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;


class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //authority
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //Main Admission Page
    public function index($id)
    {
    
        $event = $this->getEvent($id); //get Event

        //custom middleware for departments
        if(\Auth::User()->users_dept_id == 1) //if CS display everything
        {

        }
        elseif($event->events_dept_id != \Auth::User()->users_dept_id) 
        {

            \Session::flash('error', 'This event is not owned by your group.');
            return back();
        }

        //check event times
        if($event->events_end_datetime < Carbon::now())
        {
            \Session::flash('error', 'This event is concluded.');
            return back();
        }

        if($event->events_start_datetime > Carbon::now())
        {
            \Session::flash('error', 'This event is has not started.');
            return back();
        }


        //get admitted people by related event
        $admit = Admission::where('admissions_event_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('posts.admission-index', compact('event', 'admit'));
    }

    //view the admission of the event
    public function view($id)
    {
        //get event
        $event = $this->getEvent($id);

        //get admission related to event
        $admit = Admission::where('admissions_event_id', $id)->orderBy('created_at', 'DESC')->get();

        //return view
        return view('posts.admission-view', compact('event', 'admit'));
    }

    //export admission from event to csv
    public function export($id)
    {
        //get event
        $event = $this->getEvent($id);

        //create the downloadable link
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/csv'
        ,   'Content-Disposition' => 'attachment; filename='.$event->events_title.'_'.$event->events_banner_term.'_'.date("M-d-Y-h:i:s-A", strtotime($event->events_start_datetime)).'_'.date("M-d-Y-h:i:s-A", strtotime($event->events_end_datetime)).'.csv'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
        ];


        //init the admission list for event
        if($event->events_admit_out == "Y")
        {
            $list = Admission::where('admissions_event_id', $id)
            ->select('admissions_lid as Admission ID', 'admissions_first_name as First Name', 'admissions_last_name as Last Name', 'admissions_student as Student', 'admissions_employee as Employee', 'created_at as Scanned IN', 'admissions_admit_out_at as Scanned OUT')
            ->get()
            ->toArray();
        }
        else
        {

            $list = Admission::where('admissions_event_id', $id)
            ->select('admissions_lid as Admission ID', 'admissions_first_name as First Name', 'admissions_last_name as Last Name', 'admissions_student as Student', 'admissions_employee as Employee', 'created_at as Scanned')
            ->get()
            ->toArray();
        }

        //add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));


        //create csv
        $callback = function() use ($list) 
        {
            $FH = fopen('php://output', 'w');

            //print each row of query into csv
            foreach ($list as $row) { 
                fputcsv($FH, $row);
            }
            fclose($FH);
        };


        //return download
        return response()->stream($callback, 200, $headers);
    }

    //find students/employees on banner
    public function find($eventid)
    {   
        //grab event
        $event = Event::where('events.id', $eventid)->first();

        //grab term of event
        $term = $event->events_banner_term;


        $first = request('first'); //request first name input
        $last = request('last');  //request last name input

        $list = Person::where('term', $term)->orderBy('last_name')->orderBy('first_name');


        //conditionals on searching students and employees
        if($event->events_admit_students == 'Y' && $event->events_admit_employees == 'N')

            $list->where('student', 'Y');
       
        if($event->events_admit_students == 'N' && $event->events_admit_employees == 'Y')

            $list->where('employee', 'Y');
       
        if($event->events_admit_students == 'Y' && $event->events_admit_employees == 'Y')

            $list->where(function ($query) {
                $query->where('student', 'Y')
                      ->orWhere('employee', 'Y');
            });
        
        if(request('first') != "") $list->where('first_name', $first); //bind if first exist

        if(request('last') != "") $list->where('last_name', $last); 
        

        $list = $list->get();

        if(count($list) == 0) return['denied'];

        
        

        return ['success', $list]; //return success and list of query

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($eventid)
    {
        //get event
        $event = Event::where('events.id', $eventid)->first();

        if($event->count() == 0) return ['noevent']; //if event does not exist
        if($event->events_end_datetime < Carbon::now()) return ['finished']; //if event not started
        if($event->events_start_datetime > Carbon::now()) return ['nostart']; //if event ended 
        if(request('lid') == "") return ['nolid']; //if input does not exist
        
        $lid = request('lid'); 

        $dupe = Admission::where('admissions_lid', $lid)->where('admissions_event_id', $eventid)->first(); //check for duplicated entries
        
        if($dupe != null) return ['dupe', $dupe]; //return dupe if any applications

        $term = $event->events_banner_term; //return term

        $sql = ""; //init query

        $list = Person::where('term', $term)->where('lid', $lid)->orderBy('last_name')->orderBy('first_name')->first();

        if($list == null) return ['denied']; //if empty then

        //check to see if student or employee or both conditionals
        if($event->events_admit_students == "Y" && $event->events_admit_employees == "N" )
        {
            if($list->student == 'N')return ['denied'];
        }
        elseif($event->events_admit_employees == "Y" && $event->events_admit_students == "N")
        {
            if($list->employee == 'N')return ['denied'];
        }
        elseif($event->events_admit_students == "Y" && $event->events_admit_employees == "Y")
        {
            if($list->employee == 'N' && $list->student == 'N')return ['denied'];
        }
        else
        {
            return['denied'];
        }

        $first = $list->first_name; //init firstname
        $last = $list->last_name; //init lastname
        $student = $list->student; //init student status
        $employee = $list->employee; //inite employee status

        
        //Create Admission
        $response = Admission::create(
            [
                'admissions_event_id' => $eventid,
                'admissions_lid' => $lid,
                'admissions_first_name' => $first,
                'admissions_last_name' => $last,
                'admissions_student' => $student,
                'admissions_employee' => $employee,   
            ]
        );
        
        //Adds points to student if successfully admitted. -DB
        $pointQuery=DB::table('people')
            ->select(DB::raw("lid"))
            ->where('lid', '=', $lid)
            ->update(['points'=>DB::raw('points+1')]);
        
        return ['success', $response];



    }


    public function out($id)
    {
    
        $event = $this->getEvent($id); //get Event

        if($event->events_admit_out == "N")
        {
            \Session::flash('error', 'No Access to out.');

            return back();
        }

        //custom middleware for departments
        if(\Auth::User()->users_dept_id == 1) //if CS display everything
        {

        }
        elseif($event->events_dept_id != \Auth::User()->users_dept_id) 
        {

            \Session::flash('error', 'This event is not owned by your group.');
            return back();
        }

        //check event times
        if($event->events_end_datetime < Carbon::now())
        {
            \Session::flash('error', 'This event is concluded.');
            return back();
        }

        if($event->events_start_datetime > Carbon::now())
        {
            \Session::flash('error', 'This event is has not started.');
            return back();
        }


        //get admitted people by related event
        $admit = Admission::where('admissions_event_id', $id)->whereNotNull('admissions_admit_out_at')->orderBy('admissions_admit_out_at', 'DESC')->get();

        return view('posts.admission-out', compact('event', 'admit'));
    }


    public function update($eventid)
    {
        //get event
        $event = Event::where('events.id', $eventid)->first();

        if($event == null) return ['noevent']; //if event does not exist
        if($event->events_end_datetime < Carbon::now()) return ['finished']; //if event not started
        if($event->events_start_datetime > Carbon::now()) return ['nostart']; //if event ended 
        if(request('lid') == "") return ['nolid']; //if input does not exist
        
        $lid = request('lid'); 

        $dupe = Admission::where('admissions_lid', $lid)
        ->where('admissions_event_id', $eventid)
        ->whereNotNull('admissions_admit_out_at')
        ->first(); //check for duplicated entries

        if($dupe != null) return ['dupe', $dupe]; //return dupe if any applications

        $ad = Admission::where('admissions_lid', $lid)->where('admissions_event_id', $eventid)->first();

        if($ad == null)
        {
            return ['denied'];
        }

        //Create Admission
         Admission::where('admissions_lid', $lid)->where('admissions_event_id', $eventid)->update(
            [
               
                'admissions_admit_out_at' => Carbon::now(),
            ]
        );


          $response = Admission::where('admissions_lid', $lid)->where('admissions_event_id', $eventid)->first();

        return ['success', $response];
    }

}
