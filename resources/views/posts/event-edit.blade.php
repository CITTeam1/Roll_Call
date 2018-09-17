@extends('layouts.master')
@section('content')
<div class="container-fluid" style="margin-top: 7%">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-xl-10">
            <h1 class="text-center">Edit Event</h1>
            <br>
                @include('layouts.errors')
                @include('layouts.sessions')  
            <a href="/home" class="btn btn-primary text-center">Go Back</a>
            <!-- Create Events -->
            <div class="card">
                <div class="card-header">
                    <b>Create Event</b>
                </div>
                <div class="card-body">
                    <!-- Create Events List -->
                    <form method="POST" action="/event/edit/{{$event->id}}/update">
                    	 {{csrf_field()}}
                    	 {{ method_field('PATCH') }}
                        <div class="form-group row">
                            <label for="eventTitle" class="col-xl-2 col-form-label">Event Title</label>
                            <div class="col-9">
                                <input type="text" maxlength="256"  class="form-control" id="eventTitle" name="eventTitle" placeholder="Title" required="" value="{{$event->events_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventTerm" class="col-xl-2 col-form-label">Event Term</label>
                            <div class="col-xl-4">
                                <select class="form-control" id="eventTerm" name="eventTerm" required="">
                                    <option selected disabled hidden style='display: none' value=''></option>
                                    <option  style='' value=''></option>
                                    @foreach ($terms as $t) 
                                      <option @if($event->events_banner_term == $t->CODE) selected @endif value="{{$t->CODE}}-{{$t->TERM}}">{{$t->TERM}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventStart" class="col-xl-2 col-form-label">Admission Date</label>
                            <div class="col-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Start</span>
                                    </div>
                                    <input type="datetime-local" class="form-control" id="eventStart" name="eventStart" placeholder="Start" required="" min="{{date('Y-m-d')}}T00:00" value="{{date('Y-m-d', strtotime($event->events_start_datetime))}}T{{date('H:i:s', strtotime($event->events_start_datetime))}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">End</span>
                                    </div>
                                    <input type="datetime-local" class="form-control" id="eventEnd" name="eventEnd" placeholder="End" required="" value="{{date('Y-m-d', strtotime($event->events_end_datetime))}}T{{date('H:i:s', strtotime($event->events_end_datetime))}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventDesc" class="col-xl-2 col-form-label">Event Description</label>
                            <div class="col-xl-9">
                                <textarea type="text" class="form-control" maxlength="3000" row="5" cols="50" id="eventDesc" name="eventDesc" placeholder="(3000 Character Limit)" required="">{{$event->events_desc}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventTitle" class="col-xl-2 col-form-label">Event Admission</label>
                            <div class="col-xl-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkboxStudent" name="eventAdmission[]" value="student" @if($event->events_admit_students == "Y") checked @endif>
                                    <label class="form-check-label" for="checkboxStudent">Student</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkboxFacultyStaff" name="eventAdmission[]" value="faculty-staff" @if($event->events_admit_employees == "Y") checked @endif>
                                    <label class="form-check-label" for="checkboxFacultyStaff">Faculty/Staff</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventTitle" class="col-xl-2 col-form-label">Admit Out Option</label>
                            <div class="col-xl-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="radioOutY" name="eventOut" value="Y" @if($event->events_admit_out == "Y") checked @endif>
                                    <label class="form-check-label" for="radioOutY">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="radioOutN" name="eventOut" value="N" @if($event->events_admit_out == "N") checked @endif>
                                    <label class="form-check-label" for="radioOutN">No</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button id="deleteButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">Delete Event</button>
                        <button class="btn btn-primary pull-right" type="submit">Update Event</button>
                    </form> 	
                </div>
                <div class="card-footer">                    
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deletelabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal_1">Delete Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <form method="POST" action="{{url('/event/edit/'.$event->id.'/delete/')}}">
	            <div class="modal-body">
	            	<p id="cancelText">Delete this event?</p>
	                	{{ method_field('DELETE') }}
	                    {{csrf_field()}}
	              
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary pull-left"  data-dismiss="modal">Close</button>
	                <button type="submit" onclick="this.modal('toggle')" class="btn btn-primary">Delete</button>
	                
	            </div>
            </form>
        </div>
    </div>
</div>
@endsection
