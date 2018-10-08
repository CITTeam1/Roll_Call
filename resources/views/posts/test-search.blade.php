@extends('layouts.master')

@section('content')
<div class="container-fluid" style="margin-top: 7%">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-xl-10">
            <h1 class="text-center">Awards!</h1>
            <br>
                @include('layouts.errors')
                @include('layouts.sessions')  
            
                    <div class="input-group" style="width: 24em; margin: 0 auto;">

                        <input style="width: 9em; text-align: center;" type="text" maxlength="9"  class="form-control" id="admitId" name="admitId" placeholder="L-ID" required="" autofocus="autofocus">
                        <div class="input-group-append">
                            <button id="searchButton" class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div> 
            <br><br><br>
        </div>
    </div>
</div>

<script type="text/javascript">

function findId(lid){ 
    var message = "";
    var mType = "";
    var data = "";

    if($.trim(lid) != ''){
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('#admitId').val("");
        $.ajax({
            url: '/event/findLID{id}',

            method: "POST",

            data: {lid:lid},

            success: function (response) {

                switch(response[0])
                {
                    

                    break;
                    case 'nolid':
                    mType = "danger";

                    message = "No L-ID on input."

                    break;
                    case 'dupe':
                    mType = "warning";


                    message = response[1].admissions_lid+": "+response[1].admissions_first_name+" "+response[1].admissions_last_name+" already admitted to event at "+cD+".";
     

                    break;
                    case 'noconn':
                    mType = "danger";

                    message = "Cannot connect to database to search L-ID.";

                    break;
                    case 'denied':
                    mType = "warning";

                    message = "This person does not exist in the L-ID database for this event."

                    break;
                    case 'success':
                    mType = "success";

                    message = response[1].admissions_lid+": "+response[1].admissions_first_name+" "+response[1].admissions_last_name+" successfully added to admission to this event.";

    }


}

$('#searchButton').click(
    function() {
        findId($('#admitId').val());
});

$(document).keypress(function(e) {
    if(e.which == 13) {
      findId($('#admitId').val());
    }
});

</script>