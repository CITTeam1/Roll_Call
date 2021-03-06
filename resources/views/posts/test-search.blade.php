@extends('layouts.master')

@section('content')
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<div class="awards-page">
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
<div class="col-xl-10 col-xl-offset-5 textwrapper">
    @if(isset($result))
        @foreach($result as $re)
            <p id="displayPoints" class="text-center"> Hello {{$re->first_name}} {{$re->last_name}}, you have {{$re->points}} points.</p>
        @endforeach
    @else
        <p id="displayPoints" class="text-center"> Example: L12345678</p>
    @endif
</div> 

<!--Code for body of page zc-->
<div>
    <table width = 99% border="0" cellspacing="0" cellpadding="2" class="col">
        <tbody>
            <tr>
                <!--Left section of the page zc-->
                <td width="33%" align="center" valign="top">
                    <!-- Left section of the page for past 5 events zc-->
                        
                        <div class="d-inline-flex pastevents">
                        
                            <h2 class="past-events">Past 5 Events Visted</h2>

                        </div>
                        <div>
                            
                            <!-- Grabs the 5 most recent events of the lid searched and posts the name
                                and time of the event -->
                            @if(isset($pEvent))
                                    @foreach($pEvent as $pEve)
                                        <!--converts the events_start_datetime to mm-dd-yyyy format-->
                                        <?php 
                                            $pDates = $pEve->events_start_datetime;
                                            $pDates = date("F j, Y")
                                        ?>
                                            <!--displays each event seperately -->
                                            <p class="past-events-text"> 
                                                <b>{{$pEve->events_title}}</b><br>{{$pDates}}
                                            </p>

                                    @endforeach
                            @else 
                                <p class="past-events-text"> No past events</p>
                            @endif
                            
                            
                        </div>
                    </td>

                    <!--Middle section of the page zc-->
                    <td width="33%" align="left" valign="top">
                    <!--Code for scrollable awards table zc-->
                        <div class= "table-wrapper-scroll-y">
                            <table class = "awards table-bg">
                                <thead>
                                    <tr>
                                        <th width="24%">Name</th>
                                        <th width="54%">Description</th>
                                        <th width="23%">Points Req</th>
                                    </tr>    
                                </thead>
                                <tbody class="table">
                                    <tr>
                                        <th width="25%">Pencil</th>
                                        <td width="55%">Great for notes, scantrons, and drawing</td>
                                        <td width="20%">1</td>
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
                                        <td>40% off your next purchase</td>
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

                    </td>

                    <!--Right section of the page zc-->
                    <td width="33%" align="center" valign="top">
                        <div>
                        <!--for buttons/links to other pages zc-->
                        <p>
                            <a href="/login""><img src="/pictures/teachersignin.jpg" title="Teacher Faculty Log In" alt="Teachers and Faculty Sign In Here" width="330" height="61" border="0" onmouseover="this.src='/pictures/teachersignin_hl.jpg'" onmouseout="this.src='/pictures/teachersignin.jpg'"></a>
                        </p>
                        <p>
                            <a href="http://www.bpcc.edu/calendars/events/index.html"><img src="/pictures/eventcalendar.jpg" title="Bpcc Events Calendar" alt="Bpcc Events Calendar" width="330" height="61" border="0" onmouseover="this.src='/pictures/eventcalendar_hl.jpg'" onmouseout="this.src='/pictures/eventcalendar.jpg'"></a>
                        </p>

                            <!-- Table below the buttons to orginize the icons and links zc-->
                            <table width = 75% border="0" cellspacing="0" cellpadding="2" id="followbpcc">

                                <tbody>
                                    <!-- Top row of icons zc-->
                                    <tr>
                                        <td width="20%" align="center" valign="middle">
                                            <a href="http://www.bpcc.edu/lola/login/index.html" target="_blank">
                                                <img src="/pictures/lola.png" alt="Sign into LOLA" title="Sign into LOLA" width="50" height="50" border="0">
                                            </a>
                                                <br>
                                                    LOLA
                                        </td>

                                            <td width="3%">&nbsp;</td>

                                        <td width="20%" align="center" valign="middle">
                                            <a href="https://my.bpcc.edu" target="_blank">
                                                <img src="/pictures/mybpcc.png" alt="Sign into myBPCC" title="Sign into myBPCC" width="50" height="50" border="0">
                                            </a>
                                                <br>
                                                    myBPCC
                                        </td>

                                            <td width="3%">&nbsp;</td>

                                        <td width="20%" align="center" valign="middle">
                                            <a href="http://www.bpcc.edu/email/index.html"target= "_blank">
                                                <img src="/pictures/email.png" alt="Email" title="Email" width="50" height="50" border="0">
                                            </a>
                                                <br>
                                                    Email
                                        </td>
                                    </tr>
                                    
                                    <br><br>

                                    <!-- Bottom row of icons zc-->
                                    <tr>
                                        <td align="center" valign="middle">
                                            <a href="http://www.facebook.com/pages/Bossier-City-LA/Bossier-Parish-Community-College/131395030236355?ref=sgm" target="_blank">
                                                <img src="/pictures/facebook.png" alt="Facebook" title="Follow Bpcc on Facebook" width="50" height="50" border="0">
                                            </a>
                                                <br>
                                                    Facebook
                                        </td>

                                        <td>&nbsp;</td>

                                        <td align="center" valign="middle">
                                            <a href="http://twitter.com/bpcccavs" target="_blank">
                                                <img src="/pictures/twitter.png" alt="Follow Bpcc on Twitter" title="Twitter" width="50" height="50" border="0">
                                            </a>
                                                <br>
                                                    Twitter
                                        </td>

                                        <td>&nbsp;</td>

                                        <td align="center" valign="middle">
                                            <a href="http://www.bpcc.edu/emergency/index.html" target="_blank">
                                                <img src="/pictures/cavalert.png" alt="CAValert: Register Now" title="CAValert: Register Now" width="50" height="50" border="0">
                                            </a>
                                                <br>
                                                    CAVSalert
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
             </tbody>
         </table>
    </div>
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