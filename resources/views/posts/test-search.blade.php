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
<div class="col-xl-10 col-xl-offset-5">
    @if(isset($result))
        @foreach($result as $re)
            <p id="displayPoints" class="text-center" style="center;"> Hello {{$re->first_name}} {{$re->last_name}}, your lid is {{$re->lid}} </p>
        @endforeach
    @else
        <p id="displayPoints" class="text-center" style="text-align: center;"> Example: L12345678</p>
    @endif
</div> 

<!--Code for body of page zc-->
<div>
    <table width = 99% border="0" cellspacing="0" cellpadding="2" class="col">
        <tbody>
            <tr>
                <!--Left section of the page zc-->
                <td width="33%" align="center" valign="top">
                    <!-- scrollable event updater using iframe zc-->
                    <!-- Title/heading for Iframe event updater zc-->
                    <h3> Events/Important Information </h3>
                    
                    <!-- IFRAME Scroller Start-->
                    <script type="text/javascript">

                    /*********************************
                    *IFRAM Scroller script- @Dynamic Drive DHTML code library (www.dynamicdrive.com)
                    *This notice MUST stay intact for legal use
                    *Visit Dynamic Dribr at http://www.dynamicdrive.com/ for full source code
                    **********************************/

                    //specify path to your external page:
                    //for regular anouncments use "events/mainpage.html"
                    //but that page is not connected to this project so 
                    //so use "searchpageEventsInformation.html" for the time being
                    //for college closure annoucements, replace with "events/mainpage-closure.html" or "events/mainpage-closure-noscroll.html"

                    var iframesrc="../events/searchpageEventsInformation.html"

                    //you may change most attributes of iframe tag below
                    document.write('<iframe id="datamain" src="'+iframesrc+'" height="200px" marginwidth="0" marginheight="0" vspace="20" frameborder="0" scrolling="no"></iframe>')

                    </script>

                    <!--Link to Bpcc Calendar page zc-->
                    <p>&nbsp;</p>
                        <p>
                            <a href="http://www.bpcc.edu/calendars/events/index.html" target="_blank">View more on the Bpcc Events Calender</a>
                        </p>

                </td>
                <!--Middle section of the page zc-->
                <td width="33%" align="left" valign="top">
                <!--Code for scrollable awards table zc-->
                    <div class= "table-wrapper-scroll-y">
                        <table class = "awards table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th width="24%">Name</th>
                                    <th width="53%">Description</th>
                                    <th width="24%">Points Req</th>
                                </tr>    
                            </thead>
                            <tbody>
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
                    <!--Link to login page zc-->
                        <p>&nbsp;</p>
                            <p>&nbsp;</p>
                                <p align="center">
                                    <a href="../login">Teachers and Faculty click here to login</a>
                                </p>
                    
                </td>
                <!--Right section of the page zc-->
                <td width="34%" align="center" valign="top">
                    <div>
                    <!--for buttons/links to other pages zc-->
                    <p>
                        <a href="http://www.bpcc.edu/admissions/application/index.html"><img src="../images/buttons/applynow.jpg" title="Apply Now" alt="Apply Now" width="300" height="61" border="0" onmouseover="this.src='../images/buttons/applynow_hl.jpg'" onmouseout="this.src='../images/buttons/applynow.jpg'"></a>
                    </p>
                    <p>
                        <a href="http://www.bpcc.edu/futurestudents/visit/index.html"><img src="../images/buttons/visitbpcc.jpg" title="Visit bpcc" alt="Visit bpcc" width="300" height="61" border="0" onmouseover="this.src='../images/buttons/visitbpcc_hl.jpg'" onmouseout="this.src='../images/buttons/visitbpcc.jpg'"></a>
                    </p>
                    <p>
                        <a href="http://www.bpcc.edu/registration/paymentoptions.html"><img src="../images/buttons/howtopay.jpg" title="How to Pay" alt="How to Pay" width="300" height="61" border="0" onmouseover="this.src='../images/buttons/howtopay_hl.jpg'" onmouseout="this.src='../images/buttons/howtopay.jpg'"></a>
                    </p>
                    <p>
                        <a href="http://www.bpccfoundation.org"><img src="../images/buttons/supportbpcc.jpg" title="Support bpcc" alt="Support bpcc" width="300" height="61" border="0" onmouseover="this.src='../images/buttons/supportbpcc_hl.jpg'" onmouseout="this.src='../images/buttons/supportbpcc.jpg'"></a>
                    </p>

                        <!-- Table below the buttons to orginize the icons and links zc-->
                        <table width = 99% border="0" cellspacing="0" cellpadding="2" id="followbpcc">

                            <tbody>
                                <!-- Top row of icons zc-->
                                <tr>
                                    <td width="30%" align="center" valign="middle">
                                        <a href="http://www.bpcc.edu/lola/login/index.html" target="_blank">
                                            <img src="../images/icons/lola.png" alt="Sign into LOLA" title="Sign into LOLA" width="50" height="50" border="0">
                                        </a>
                                            <br>
                                                LOLA
                                    </td>

                                    <td width="30%" align="center" valign="middle">
                                        <a href="https://my.bpcc.edu" target="_blank">
                                            <img src="../images/icons/mybpcc.png" alt="Sign into myBPCC" title="Sign into myBPCC" width="50" height="50" border="0">
                                        </a>
                                            <br>
                                                myBPCC
                                    </td>

                                    <td width="30%" align="center" valign="middle">
                                        <a href="http://www.bpcc.edu/email/index.html"target= "_blank">
                                            <img src="../images/icons/email.png" alt="Email" title="Email" width="50" height="50" border="0">
                                        </a>
                                            <br>
                                                Email
                                    </td>
                                </tr>
                                <!-- Bottom row of icons zc-->
                                <tr>
                                    <td align="center" valign="middle">
                                        <a href="http://www.facebook.com/pages/Bossier-City-LA/Bossier-Parish-Community-College/131395030236355?ref=sgm" target="_blank">
                                            <img src="../images/icons/facebook.png" alt="Facebook" title="Follow Bpcc on Facebook" width="50" height="50" border="0">
                                        </a>
                                            <br>
                                                Facebook
                                    </td>

                                    <td align="center" valign="middle">
                                        <a href="http://twitter.com/bpcccavs" target="_blank">
                                            <img src="../images/icons/twitter.png" alt="Follow Bpcc on Twitter" title="Twitter" width="50" height="50" border="0">
                                        </a>
                                            <br>
                                                Twitter
                                    </td>

                                    <td align="center" valign="middle">
                                        <a href="http://www.bpcc.edu/emergency/index.html" target="_blank">
                                            <img src="../images/icons/cavalert.png" alt="CAValert: Register Now" title="CAValert: Register Now" width="50" height="50" border="0">
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