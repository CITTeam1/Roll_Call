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
<!-- zc code for scrollable awards table -->
<div class="d-flex justify-content-center">
    <div class= "table-wrapper-scroll-y">
        <table class = "awards table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Points Req</th>
                </tr>    
            </thead>
            <tbody>
                <tr>
                    <th scope="row"> Pencil</th>
                    <td>Great for notes, scantrons, and drawing</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row"> Notebook</th>
                    <td>Great for notes and homework</td>
                    <td>2</td>
                </tr>
                <tr>
                    <th scope="row"> Usb</th>
                    <td>Great for saving things on the go</td>
                    <td>3</td>
                </tr>
                <tr>
                    <th scope="row">School Store</th>
                    <td>40% doff your next purchase</td>
                    <td>4</td>
                </tr>
                <tr>
                    <th scope="row"">School Store</th>
                    <td>50% off your next purchase</td>
                    <td>5</td>
                </tr>
                <tr>
                    <th scope="row"">Item</th>
                    <td>Detailed description</td>
                    <td>#</td>
                </tr>
                <tr>
                    <th scope="row"">Item</th>
                    <td>Detailed description</td>
                    <td>#</td>
                </tr>
                <tr>
                    <th scope="row"">Item</th>
                    <td>Detailed description</td>
                    <td>#</td>
                </tr>
                <tr>
                    <th scope="row"">Item</th>
                    <td>Detailed description</td>
                    <td>#</td>
                </tr>
                <tr>
                    <th scope="row"">Item</th>
                    <td>Detailed description</td>
                    <td>#</td>
                </tr>
            </tbody>
        </table>
     </div>
</div>
<script type="text/javascript">



$('#searchButton').click(
    function() {
        findId($('#admitId').val());
});

</script>