<?php
//MY MPESA API KEYS
$consumerKey = "mkiNkGBwfGMJAKEX0n2STVAY1spjgo1nomTqa1ZZokQ9g89e";//Daraja consumer key
$consumerSecret = "Q6XgrxqItF3K3qrjiK2Jei6KY3rsNNzS2sSxae07PqBlUqm67hvPGrRAuzFE7yLy";//Daraja consumer secret
//ACCESS TOKEN URL
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';//Generated from DARAJA API interface under authorization.
$headers = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($access_token_url); //initiate curl request
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
 $result = curl_exec($curl);
 $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
 
 $result = json_decode($result);
 $access_token = $result->access_token;//access token to be used to call all apis
 curl_close($curl);
 ?>