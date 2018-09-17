@extends('layouts.master')

@section('content')
<div class="container-fluid" style="margin-top: 7%">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-xl-10">
            <h1 class="text-center">Roll Call</h1>
            <h2 class="text-center">{{$dept->dept_desc}}</h2>
            <br>
                @include('layouts.errors')
                @include('layouts.sessions')  
            <a href="/event/create/" class="btn btn-primary text-center">Add New Event</a>
            <!-- Current Events -->
            <div class="card"><!--C Start-->
                <div class="card-header">
                    <b>Current Events</b>
                </div>
                <div class="card-body">
                    <!-- Current Events List -->
                    @foreach($current as $e)
                    <div class="card">
                        <div class="card-header">
                            <b>{{date("M d, Y, h:i:s A", strtotime($e->events_start_datetime))}}</b>
                            <b class="pull-right">{{date("M d, Y, h:i:s A", strtotime($e->events_end_datetime))}}</b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4">
                                     <b>{{$e->events_title}}</b>
                                </div>
                                <div class="col-xl-5">
                                    @if($e->events_admit_students == "Y")
                                    <span class="badge badge-primary">Student</span>
                                    @endif
                                    @if($e->events_admit_employees == "Y")
                                    <span class="badge badge-primary">Faculty/Staff</span>
                                    @endif
                                </div>
                                <div class="col-xl-3">
                                    <a href="/event/edit/{{$e->id}}" class="btn btn-primary text-center">Edit Event</a>
                                    @if($e->events_admit_out == "Y") 
                                    <a href="/event/admit/{{$e->id}}/out" class="btn btn-danger">Admit OUT</a>
                                    <a href="/event/admit/{{$e->id}}" class="btn btn-success">Admit IN</a>
                                    @else
                                    <a href="/event/admit/{{$e->id}}" class="btn btn-primary pull-right">Admit</a>
                                    @endif
                                </div>  
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">                    
                </div>
            </div><!--C End-->
            <br>
            <!-- Upcoming Events -->
            <div class="card"><!--UE Start-->
                <div class="card-header">
                    <b>Upcoming Events</b>
                </div>
                <div class="card-body">
                    <!-- Upcoming Events List -->
                    @foreach($upcoming as $e)
                    <div class="card">  
                        <div class="card-header">
                            <b>{{date("M d, Y, h:i:s A", strtotime($e->events_start_datetime))}}</b>
                            <b class="pull-right">{{date("M d, Y, h:i:s A", strtotime($e->events_end_datetime))}}</b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4">
                                     <b>{{$e->events_title}}</b>
                                </div>
                                <div class="col-xl-5">
                                    @if($e->events_admit_students == "Y")
                                    <span class="badge badge-primary">Student</span>
                                    @endif
                                    @if($e->events_admit_employees == "Y")
                                    <span class="badge badge-primary">Faculty/Staff</span>
                                    @endif
                                </div>
                                <div class="col-xl-3">
                                    <a href="/event/edit/{{$e->id}}" class="btn btn-primary pull-right">Edit Event</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">                    
                </div>
            </div><!--UE End-->
            <br>
            <!-- Past Events -->
            <div class="card"><!--P Start-->
                <div class="card-header">
                    <b>Past Events</b><a href="/event/view/past" class="btn btn-primary pull-right">View Past Events</a>
                </div>
                <div class="card-body">
                    <!-- Past Events List -->
                    @foreach($past as $e)
                    <div class="card">  
                        <div class="card-header">
                            <b>{{date("M d, Y, h:i:s A", strtotime($e->events_start_datetime))}}</b>
                            <b class="pull-right">{{date("M d, Y, h:i:s A", strtotime($e->events_end_datetime))}}</b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4"><!--Event Title-->
                                     <b>{{$e->events_title}}</b>
                                </div>
                                <div class="col-xl-5"><!--Event Badges-->
                                    @if($e->events_admit_students == "Y")
                                    <span class="badge badge-primary">Student</span>
                                    @endif
                                    @if($e->events_admit_employees == "Y")
                                    <span class="badge badge-primary">Faculty/Staff</span>
                                    @endif
                                </div>
                                <div class="col-xl-3">
                                    <a href="/event/admit/{{$e->id}}/view/" class="btn btn-primary pull-right">View Admissions</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!--P End-->
                <div class="card-footer">                    
                </div>
            </div>

        </div>
    </div>
    <br>
</div>

@endsection
