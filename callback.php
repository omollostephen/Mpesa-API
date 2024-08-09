<?php
//paste this in the server call back file
// include 'db.php';
header("Content-Type: application/json");
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "MpesaStkResponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose();

$data = json_decode($stkCallbackResponse);

$MerchantRequestID = $data->Body->stkCallback->MerchantRequestID;
$CheckoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
$ResultCode = $data->Body->stkCallback->ResultCode;
$ResultDesc = $data->Body->stkCallback->ResultDesc;
$Amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->value;
$TransactionId = $data->Body->stkCallback->CallbackMetadata->Item[1]->value;
$phone = $data->Body->stkCallback->CallbackMetadata->Item[4]->value;
//CHECK IF TRANSACTION IS SUCCESSFUL
if($ResultCode == 0){
   // STORE THE TRANSACTION DETAILS IN THE DATABASE
    mysql_query($db, "INSERT INTO payments (MerchantRequestID, CheckoutRequestID, ResultCode, MpesaReceiptNumber Amount, MpesaPhoneNo,)
     VALUES('$MerchantRequestID','$CheckoutRequestID','$ResultCode','$TransactionId','$Amount','$phone')");
    mysql_query($db,"INSERT INTO payments (MerchantRequestID, CheckoutRequestID, ResultCode, MpesaReceiptNumber Amount, MpesaPhoneNo,) VALUES
    ('$MerchantRequestID','$CheckoutRequestID','$ResultCode','$TransactionId','$Amount','$phone')");
}
?>
