<?php
require 'params.php';

$url = $baseUrl.'/'.$appid.'/cloud_recording/resourceid/'.$resourceid.'/mode/'.$mode.'/start';

$layoutCustomize = [
  [
    'x_axis'=> 0.0,
    'y_axis'=> 0.0,
    'width'=> 1.0,
    'height'=> 1.0
  ]
];

$transcodingConfig = [
  'height' => 640,
  'width' => 360,
  'fps' => 15,
  'bitrate' => 500,
  'mixedVideoLayout' => 3,
  'layoutConfig' => $layoutCustomize
];

$recordingConfig = [
   'channelType' => 1, 
   'streamTypes' => 2,
   'maxIdleTime' => 30,
   'transcodingConfig' => $transcodingConfig
];


$storageConfig= [
  'accessKey' => $accessKey,
  'region' => 10,
  'bucket' => $bucket,
  'secretKey' => $secretKey,
  'vendor' => 1,
  'fileNamePrefix' => $fileNamePrefix
];

$clientRequest = [
  'token' => "",
  'recordingConfig' => $recordingConfig,
  'storageConfig' => $storageConfig
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

