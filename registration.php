<html >
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>






<div class="container-fluid" style="background-color:#c4c4c4; padding-top:10px; padding-bottom:10px; position:relative;">
    <img src="a1.jpg" alt="LOGO" height="127px" width="180px" style="margin-left:10px" />&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
    <font style="font-size:30px; top:50%; position:absolute;">Welcome To Aadhar Portal</font>
    <img src="emblem.jpg" alt="IndianEmblem" height="127px" width="85px" style="position:absolute; right:50px;" />
  </div>
<br>
 <div class="container-fluid" >
      <div class=" navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <a href="HomeLayout.html" class="navbar-brand">Cosmic Developers</a>
          </div>
          <div>
            <ul class="nav navbar-nav">
              <li><a href="HomeLayout.html">Home</a></li>
              <li><a href="registration.php">Register</a></li>
              
              <li><a href="charta.html">charts</a></li>
              <li><a href="mmm.html">Map Analysis</a></li>
            </ul>
          </div>
        </div>
      </div>
   </div>










<div class="container">
  <h2>Aadhar Card</h2>


<form method='POST'>
<div class="form-group">
      
      <input type="text" class="form-control" id="email" name="adhar" placeholder="Enter Aadhar card number">
    </div>

  <!-- Trigger the modal with a button -->
  <button type="submit" class="btn btn-info btn-lg" >Generate-OTP</button>

  

 </form>




<form method='POST' action="otp.php" >
<div class="form-group">
      <h2> Enter OTP</h2>
      <input type="text" class="form-control" id="email" name="ot" placeholder="Enter your OTP">
      <input type="text" class="form-control" id="email" name="pin" placeholder="Enter your PIN-Code">
    </div>

  <!-- Trigger the modal with a button -->
  <button type="submit" class="btn btn-info btn-lg" >Verify</button>
</form>

<?php





if(isset($_POST['adhar']))
  {  
    $aadhar=$_POST['adhar'];

$data= array( 
        'aadhaar-id' => $aadhar,
        'device-id' => "",
        'certificate-type' => "preprod",
        'channel' => "SMS",
        'location' =>array( 
            'type' => "",
            'latitude' => "",
            'longitude' => "",
            'altitude' => "",
            'pincode' => "",
        ),
    
);
$url ="http://139.59.30.133:9090/otp";
$payload = json_encode($data);

$ch = curl_init( $url );
# Setup request to send json via POST.
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
 echo $result = curl_exec($ch);
curl_close($ch);
$ress=json_decode($result, true);
$x=$ress['success'];
if($x==true)
{
  echo $result;

  setcookie("aadhar",$aadhar,time()+3600);
}



}

 

# Print response.
//echo "<pre>$result</pre>";
//header('Location: registration.php');








?>

</body>
</html>
