@extends('layouts.master')
@section('content')
<div class="container-fluid" style="margin-top: 7%">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-xl-10">
            <h1 class="text-center">Admission</h1>
            <br><br><br>
                @include('layouts.errors')
                @include('layouts.sessions')              
         
            <a href="/home" class="btn btn-primary text-center">Go Back</a>
            <a href="/event/admit/{{$event->id}}/export/" class="btn btn-primary pull-right">Export Admissions to CSV</a>
            <!-- Current Events -->
            <div class="card">
                <div class="card-header">
                    <b>{{date("M d, Y, h:i:s A", strtotime($event->events_start_datetime))}}</b>
                    <b class="pull-right">{{date("M d, Y, h:i:s A", strtotime($event->events_end_datetime))}}</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                             <b>{{$event->events_title}}</b>
                        </div>
                        <div class="col-xl-3">
                            @if($event->events_admit_students == "Y")
                            <span class="badge badge-primary">Student</span>
                            @endif
                            @if($event->events_admit_employees == "Y")
                            <span class="badge badge-primary">Faculty/Staff</span>
                            @endif
                        </div>
                        <div class="col-xl-5">
                            <p>{{$event->events_desc}}</p>
                        </div>  
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">L-ID</th>
                        <th scope="col">Last</th>
                        <th scope="col">First</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date/Time</th>
                    </tr>
                </thead>
                <tbody id="admitTable">
                @foreach($admit as $a)
                    <tr id="{{$a->id}}">
                        <td>{{$a->admissions_lid}}</td>
                        <td>{{$a->admissions_last_name}}</td>
                        <td>{{$a->admissions_first_name}}</td>
                        <td>@if($a->admissions_student == "Y")
                            <span class="badge badge-primary">Student</span>
                            @endif
                            @if($a->admissions_employee == "Y")
                            <span class="badge badge-primary">Faculty/Staff</span>
                            @endif
                        </td>
                        <td>{{date("M d, Y, h:i:s A", strtotime($a->created_at))}}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
    <br>
</div>
@endsection