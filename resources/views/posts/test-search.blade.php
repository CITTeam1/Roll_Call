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
<!--zc code for body of page-->
<div>
    <table width = 99% border="0" cellspacing="0" cellpadding="2" class="col">
        <tbody>
            <tr>
                <td width="33%" align="center" valign="top">
                    <!-- scrollable event updater possibly use iframe -->
                     Events/Important Information
                    <!-- line break -->
                    <br>
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
                </td>
                <td width="33%" align="left" valign="top">
                <!-- zc code for scrollable awards table -->
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
                <td width="34%" align="center" valign="top">
                    <div>
                    <!--for icon/links and links to other pages-->
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

                    <table width = 99% border="0" cellspacing="0" cellpadding="2" id="followbpcc">
                        <tbody>
                            <tr></tr>
                            <tr></tr>
                        </tbody>
                    </table>
                    </div>
                </td>
            </tr>
         </tbody>
     </table>
</div>

<script type="text/javascript">



$('#searchButton').click(
    function() {
        findId($('#admitId').val());
});

</script>