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



$('#searchButton').click(
    function() {
        findId($('#admitId').val());
});

</script>