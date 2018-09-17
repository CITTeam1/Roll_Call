@extends('layouts.master')
@section('content')
<div class="container-fluid" style="margin-top: 7%">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-xl-10">
            <h1 class="text-center">New Event</h1>
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
                    <form method="POST" action="/event/create/store">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="eventTitle" class="col-xl-2 col-form-label">Event Title</label>
                            <div class="col-9">
                                <input type="text" maxlength="256"  class="form-control" id="eventTitle" name="eventTitle" placeholder="Title" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventTerm" class="col-xl-2 col-form-label">Event Term</label>
                            <div class="col-xl-4">
                                <select class="form-control" id="eventTerm" name="eventTerm" required="">
                                    <option selected disabled hidden style='display: none' value=''></option>
                                    <option  style='' value=''></option>
                                    @foreach ($terms as $t)
                                      <option  value="{{$t->CODE}}-{{$t->TERM}}">{{$t->TERM}}</option>
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
                                    <input type="datetime-local" class="form-control" id="eventStart" name="eventStart" placeholder="Start" required="" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}T00:00">
                                    <div class="input-group-append">
                                        <span class="input-group-text">End</span>
                                    </div>
                                    <input type="datetime-local" class="form-control" id="eventEnd" name="eventEnd" placeholder="End" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventDesc" class="col-xl-2 col-form-label">Event Description</label>
                            <div class="col-md-9">
                                <textarea type="text" class="form-control" maxlength="3000" row="5" cols="50" id="eventDesc" name="eventDesc" placeholder="(3000 Character Limit)" required=""></textarea >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventTitle" class="col-xl-2 col-form-label">Event Admission</label>
                            <div class="col-xl-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkboxStudent" name="eventAdmission[]" value="student">
                                    <label class="form-check-label" for="checkboxStudent">Student</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkboxFacultyStaff" name="eventAdmission[]" value="faculty-staff">
                                    <label class="form-check-label" for="checkboxFacultyStaff">Faculty/Staff</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventTitle" class="col-xl-2 col-form-label">Admit Out Option</label>
                            <div class="col-xl-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="radioOutY" name="eventOut" value="Y">
                                    <label class="form-check-label" for="radioOutY">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="radioOutN" name="eventOut" value="N" checked>
                                    <label class="form-check-label" for="radioOutN" >No</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary pull-right" type="submit">Add Event</button>
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

@endsection
