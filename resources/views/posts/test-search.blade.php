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
                        <input style="width: 9em; text-align: center;" type="text" maxlength="9"  class="form-control" id="admitId" name="admitId" placeholder="Enter LID" required="" autofocus="autofocus">
                        <div class="input-group-append">
                            <button id="searchButton" class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div> 
            <br>
        </div>
    </div>
</div>
<!-- Displays how many points a student has. -DB -->
<div class="col-xl-10">
    @if(isset($result))
        @foreach($result as $re)
            <p id="displayPoints" class="text-center"> Hello {{$re->first_name}} {{$re->last_name}}, your lid is {{$re->lid}} </p>
        @endforeach
    @else
        <p id="displayPoints" class="text-center"> Example: L12345678</p>
    @endif
</div>
        


<script type="text/javascript">

//Button to redirect with LID entered. -DB
function findId(lid){ 
    if($.trim(lid) != ''){
        window.location.href = '/event/pointsPage/findId/' + lid;
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