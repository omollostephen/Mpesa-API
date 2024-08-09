<?php
header("Content-Type: application/json");
$response = '{
"ResultCode": 0,
"ResultDesc": "Confirmation Received Successfully"
}';
$mpesaResponse = file_get_contents('php://input');
$logFile = "C2BMpesaResponse.json";//successfull transaction datya is sent to this file
$log = fopen($logFile, 'a');
fwrite($log, $mpesaResponse);
fclose();