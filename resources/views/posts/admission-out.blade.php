@extends('layouts.master')
@section('content')
<div class="container-fluid" style="margin-top: 7%">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-xl-10">
            <h1 class="text-center">Admission</h1>
            <h2 class="text-center"><b style="color: red;">OUT</b></h2>
            <br><br><br>
                @include('layouts.errors')
                @include('layouts.sessions')  
            
                    <div class="input-group" style="width: 24em; margin: 0 auto;">
                        <div class="input-group-prepend">
                            <button id="findButton" data-toggle="modal" data-target="#findModal" class="btn btn-primary" type="button">Find Person</button>
                        </div>
                        <input style="width: 11em; text-align: center;" type="text" maxlength="9"  class="form-control" id="admitId" name="admitId" placeholder="L-ID" required="" autofocus="autofocus">
                        <div class="input-group-append">
                            <button id="admitButton" class="btn btn-primary" type="button">Admit</button>
                        </div>
                    </div> 
            <br><br><br>
            <div id="message" class="alert alert-success" style="display: none;">
                
            </div>
            <a href="/home" class="btn btn-primary text-center">Go Back</a>
            <a href="/event/edit/{{$event->id}}" class="btn btn-primary pull-right">Edit Event</a>
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
                        <th scope="col">Date/Time In</th>
                        <th scope="col">Date/Time Out</th>
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
                        <td>{{date("M d, Y, h:i:s A", strtotime($a->admissions_admit_out_at))}}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
    <br>
</div>
<div class="modal fade" id="findModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="findlabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal_1">Find Person</h5>
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">First Name</span>
                    </div>
                    <input type="text" id="find_first" class="form-control" placeholder="First">
                    <div class="input-group-append">
                        <span class="input-group-text">Last Name</span>
                    </div>
                    <input type="text" id="find_last" class="form-control" placeholder="Last">
                    <div class="input-group-append">
                        <button id="searchButton" class="btn btn-primary" type="button">Search</button>
                    </div>
                </div>
               
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">L-ID</th>
                            <th scope="col">Last</th>
                            <th scope="col">First</th>
                            <th scope="col">Type</th>
                            <th scope="col">DOB</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="findTable" style="height:80px;width:100%;overflow-y:auto">
                    </tbody>
                </table>
            </div>
            <div id="message2" class="alert alert-success" style="display: none;">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left close-btn"  data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

$('.close-btn').click(function(){

    $("#findTable").empty();
    $('#find_first').val("");
    $('#find_last').val("");

});

function messageThis(mType, messageBox, message = "") {

    switch(mType)
    {
        case 'danger':
            $(messageBox).attr("class", "alert alert-danger");
            $(messageBox).text(message);
            $(messageBox).fadeIn();
            setTimeout(function() {
                $(messageBox).fadeOut();
            }, 10000 );
        break;
        case 'warning':
            $(messageBox).attr("class", "alert alert-warning");
            $(messageBox).text(message);
            $(messageBox).fadeIn();
            setTimeout(function() {
                $(messageBox).fadeOut();
            }, 10000 );
        break;
        case 'success':
            $(messageBox).attr("class", "alert alert-success");
            $(messageBox).text(message);
            $(messageBox).fadeIn();
            setTimeout(function() {
                $(messageBox).fadeOut();
            }, 10000 );
        break;
        default:
    }

}


$('#searchButton').click(
    function() {

        var first = $('#find_first').val();
        var last = $('#find_last').val();
        var message = "";
        var mType = "";
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/event/admit/{{$event->id}}/student/find',

            method: "POST",

            data: {first:first,
                   last:last},

            success: function (response) {

                //console.log(response);

                switch(response[0])
                {
                    case 'success':
                        mType = "success";
                        message = "Results found."

                        list = response[1];

                        $("#findTable").empty();

                        for (index = 0; index < list.length; ++index) {
                            

                            var person = list[index];

                            var ptype = "";


                            if(person.student == "Y")
                            {
                                ptype += "<span class=\"badge badge-primary\">Student</span>";
                            }

                            if(person.employee == "Y")
                            {
                                ptype += "<span class=\"badge badge-primary\">Faculty/Staff</span>";
                            }

                            $("<tr id=\""+index+"\"><td>"+person.lid+"</td><td>"+person.last_name+"</td><td>"+person.first_name+"</td><td>"+ptype+"</td><td>"+person.DOB+"</td><td><button type='button' id='"+person.lid+"' class='btn btn-primary btn-use'>Use</button></td></tr>").prependTo($("#findTable")).fadeIn();
    
                        }


                    break;
                    case 'denied':
                        mType = "danger";
                        message = "No results on search.";

                    break;
                    case 'noconn':
                        mType = "danger";
                        message = "Cannot connect to database to search L-ID.";

                    break;
                    default:
                        mType = "danger";
                        message = "Oops, Something went wrong. Error on response.";


                }


                messageThis(mType, "#message2", message);

            },

            error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
            }

        });




});


$('#findTable').on("click", ".btn-use",

    function(){

    $('#admitId').val($(this).attr('id'));
    $("#findTable").empty();
    $('#find_first').val("");
    $('#find_last').val("");
    $('#findModal').modal('toggle');

});


function findId(lid)
{
    var message = "";
    var mType = "";
    var data = "";
                     
    if($.trim(lid) != '')
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $.ajax({
            url: '/event/admit/{{$event->id}}/update',

            method: "POST",

            data: {lid:lid},




            success: function (response) {

                        console.log(response);


                switch(response[0])
                {
                    case 'noevent':

                    message = "This event does not exist in record.";
                    mType = "danger";

                    break;
                    case 'finished':
                    mType = "danger";

                    message = "This event has been concluded".

                    break;
                    case 'nostart':
                    mType = "danger";
                    message = "This event has not been started."

                    break;
                    case 'nolid':
                    mType = "danger";

                    message = "No L-ID on input."

                    break;
                    case 'dupe':
                    mType = "warning";


                    var createDate = new Date(response[1].created_at);
                    var outDate = new Date(response[1].admissions_admit_out_at);

                    var options = { hc: 'h12', hour12: true, year: 'numeric', month: 'short', day: '2-digit', hour:'numeric', minute:'numeric',second:'numeric'  };

                    var cD = createDate.toLocaleDateString('en-US', options);
                    var oD = outDate.toLocaleDateString('en-US', options);

                    message = response[1].admissions_lid+": "+response[1].admissions_first_name+" "+response[1].admissions_last_name+" already admitted OUT to event at "+oD+".";
     

                    break;
                    case 'noconn':
                    mType = "danger";

                    message = "Cannot connect to database to search L-ID.";

                    break;
                    case 'denied':
                    mType = "warning";

                    message = "This person does not exist in the admission database for this event."

                    break;
                    case 'success':
                    mType = "success";

                    message = response[1].admissions_lid+": "+response[1].admissions_first_name+" "+response[1].admissions_last_name+" successfully admit OUT to this event.";

                    var ptype = "";

                    if(response[1].admissions_student == "Y")
                    {
                        ptype += "<span class=\"badge badge-primary\">Student</span>";
                    }

                    if(response[1].admissions_employee == "Y")
                    {
                        ptype += "<span class=\"badge badge-primary\">Faculty/Staff</span>";
                    }

                    var createDate = new Date(response[1].created_at);
                    var outDate = new Date(response[1].admissions_admit_out_at);

                    var options = { hc: 'h12', hour12: true, year: 'numeric', month: 'short', day: '2-digit', hour:'numeric', minute:'numeric',second:'numeric'  };

                    var cD = createDate.toLocaleDateString('en-US', options);
                    var oD = outDate.toLocaleDateString('en-US', options);

                    $("<tr id=\""+response[1].id+"\"><td>"+response[1].admissions_lid+"</td><td>"+response[1].admissions_last_name+"</td><td>"+response[1].admissions_first_name+"</td><td>"+ptype+"</td><td>"+cD+"</td><td>"+oD+"</td></tr>").prependTo($("#admitTable")).fadeIn();


                    break;
                    default:
                    mType = "danger";
                    message = "Oops, Something went wrong. Error on response.";


                }

                messageThis(mType, "#message", message);


                $('#admitId').val("");

            },

            error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
            }

        });
    }

event.preventDefault();

}

$('#admitButton').click(
    function() {
        findId($('#admitId').val());
});


$(document).keypress(function(e) {
    if(e.which == 13) {
      findId($('#admitId').val());
    }
});


$(document).scannerDetection({
    timeBeforeScanTest: 200, // wait for the next character for upto 200ms
    avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
    
    onComplete: function(barcode, qty){
        
        //$('#admitId').text(barcode);

            var lid = barcode;

            findId(lid);
            //TO DO: sep fuction then add button functionality

    }   
}); 
</script>

@endsection
