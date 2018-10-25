@extends('layouts.master')

@section('content')
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
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
    <div class="col-xl-10">
        <p name ="name" class="text-center">Hello (insert name here), you have (x) points</p>
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

        $.ajax({
            url: '/event/pointsPage/findId/'+lid,

            method: "GET",

            data: {lid:lid},



            success: function (response) {

                switch(response[1])
                {
                    case 'success':
                        message = "Results found.";
                        console.log(message);
                    
                    break;

                    default:
                    message = "Woah there cowboy.";

                } 
                //console.log(lid);  
            }
                    
    });
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