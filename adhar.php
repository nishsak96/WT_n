<?php
ob_start();
$data= array( 
        'aadhaar-id' => "592027158129",
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

$res=$_POST['adhar'];

//echo $res;

$url ="http://139.59.30.133:9090/otp";
$payload = json_encode($data);

$ch = curl_init( $url );
# Setup request to send json via POST.
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//echo "<pre>$result</pre>";


$otp=196276;

 $data=array(
        "consent"=> "Y",
        "auth-capture-request" => array(
            "aadhaar-id"=> "592027158129",
            "location"=> array(
                "type" =>"pincode",
                "pincode" => "400010"
            ),
            "modality"=> "otp",
            "certificate-type"=> "preprod",
            "otp"=>$otp
        )
    );



$url ="http://139.59.30.133:9090/kyc/raw";
$payload = json_encode($data);

$ch = curl_init( $url );
# Setup request to send json via POST.
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//echo "<pre>$result</pre>";
header('Location: registration.php');


?>