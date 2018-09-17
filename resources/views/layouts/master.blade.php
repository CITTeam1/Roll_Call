<?php 
function using_ie(){
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub =false;
    if(preg_match('/rv:/i',$user_agent))
    {$ub = true;}
    return $ub;
}


if(using_ie()==true){
 
echo"<!DOCTYPE html>
  <html>
  <head>
    <title></title>
  </head>
  <body>

  <div style='margin: 20%; width: 60%; border: 3px solid red; padding: 10px;'>You can not use <b>Internet Explorer</b> for this application please use <b>Chrome</b> or <b>Firefox</b> instead.</div>
  
  </body>
  </html>";

  dd();

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roll Call</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="/js/scannerdetection.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/custom.css">

  <meta name="csrf-token" content="{{ csrf_token() }}">



</head>
<body>
@include ('layouts.nav')
<div style="margin-top:5%">    
  @yield('content')
</div>
@include ('layouts.footer')

</body>
</html>
