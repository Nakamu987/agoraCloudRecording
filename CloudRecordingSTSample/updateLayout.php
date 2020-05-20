<?php
require 'params.php';

$url = $baseUrl.'/'.$appid.'/cloud_recording/resourceid/'.$resourceid.'/sid/'.$sid.'/mode/'.$mode.'/updateLayout';

$layoutCustomize = [
  [
    'x_axis'=> 0.0,
    'y_axis'=> 0.0,
    'width'=> 1.0,
    'height'=> 0.5,
  ],
  [
    'x_axis'=> 0.0,
    'y_axis'=> 0.5,
    'width'=> 1.0,
    'height'=> 0.5,
  ]
];

$clientRequest = [
  'mixedVideoLayout'=> 3,
  'backgroundColor'=> '#FF0000',
  'layoutConfig' => $layoutCustomize
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

//#var_dump($header);


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, TRUE);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json_enc); // パラメータをセット
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
var_dump($response);

curl_close($curl);

