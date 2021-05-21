<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_02231abab32aeb6c02d3a196a2e",
                  "X-Auth-Token:test_36acff24b3db3f09fd4863775e2"));
$payload = Array(
    'purpose' => 'Buying food',
    'amount' => '12',
    'phone' => '9999999999',
    'buyer_name' => 'Farib',
    'redirect_url' => 'http://localhost/payment%20gateway/redirect.php',
    'send_email' => true,
    // 'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => 'tysonfarib@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$response=json_decode($response);
// echo '<pre>';

// print_r($response);


$_SESSION['TID']=$response->payment_request->id;// creating session for getting id.
header('location:'.$response->payment_request->longurl);
die();

?>