<?php
require 'params.php';

$url = $baseUrl.'/'.$appid.'/cloud_recording/resourceid/'.$resourceid.'/mode/'.$mode.'/start';

$recordingConfig = [
   'maxIdleTime' => 30,
   'streamTypes' => 2,
   'audioProfile' => 0,
   'channelType' => 1, 
   'videoStreamType' => 0
];

$transcodingConfig = [
  'height' => 640,
  'width' => 360,
  'bitrate' => 500,
  'fps' => 15,
  'mixedVideoLayout' => 1
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
  'token' => $token,
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

