<?php
header("Content-Type: application/json");
$response = '{
"ResultCode": 0,
"ResultDesc": "Confirmation Received Successfully"
}';
$mpesaResponse = file_get_contents('php://input');
$logFile = "validationData.txt";//successfull transaction datya is sent to this file
$jsonMpesaResponse = json_decode($mpesaResponse, true);
$log = fopen($logFile, "a");
fwrite($log, $mpesaResponse);
fclose();