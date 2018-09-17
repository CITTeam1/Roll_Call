@extends('layouts.master')

@section('content')
<div class="container-fluid" style="margin-top: 7%">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-xl-10">
            <h1 class="text-center">Past Events</h1>
            <br>
                @include('layouts.errors')
                @include('layouts.sessions')
                <form method="GET" action="/event/view/past/search">
                {{csrf_field()}}
            <div class="input-group">
             <a href="/home" class="btn btn-primary">Go Back</a>
             
                <div class="input-group-prepend">
                    <span class="input-group-text" >Start Date</span>
                </div>
                <input type="date" class="form-control" name="start" aria-label="search">
                <div class="input-group-append">
                    <span class="input-group-text" >End Date</span>
                </div>
                <input type="date" class="form-control" name="end" aria-label="search">
                <input type="text" class="form-control" name="search" placeholder="Event Title" aria-label="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            
            </div>
           </form>
            <!-- Past Events -->
            <div class="card">
                <div class="card-header">
                    <b>Past Events</b>
                </div>
                <div class="card-body">
                {{$past->appends(['start' => Request::get('start'), 'end' => Request::get('end'), 'search' => Request::get('search')])->links()}}
                    <!-- Past Events List -->
                    @foreach($past as $e)
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
                                    <a href="/event/admit/{{$e->id}}/view/" class="btn btn-primary pull-right">View Admissions</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">                    
                </div>
            </div>

        </div>
    </div>
    <br>
</div>

@endsection
