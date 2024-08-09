<?php
//MY MPESA API KEYS
$consumerKey = "0O48LfXKBSCqN1D9T0sSKuBgnKJp7SyudHVZeGCmpvfMRAmp";//Daraja consumer key
$consumerSecret = "jQAf6t4JQJbPhMYP3weJu0l74JA5eBTi4aDvrYvZWiCyVQ9MLleEOU8AbJHtp6nO";//Daraja consumer secret
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