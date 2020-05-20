<?php
require 'params.php';

$url = $baseUrl.'/'.$appid.'/cloud_recording/acquire';
$clientRequest = [
  'resourceExpiredHour' => 1
];

$params = [
  'cname' => $cname,
  'uid' => $uid,
  'clientRequest' => $clientRequest
];
$json_enc = json_encode($params);

#var_dump($json_enc);


$header = array();
$header[] = 'Content-type: application/json;charset=utf-8';
$header[] = 'Authorization: Basic '.base64_encode($plainCredentials);

#var_dump($header);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, TRUE);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json_enc); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

var_dump($response);

curl_close($curl);

