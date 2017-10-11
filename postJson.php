<?php

include_once 'apiFetch.php';

//API Url
$url = 'PostURL';
 
//Initiate cURL.
$ch = curl_init($url);
 
//The JSON data.
$finalPostArray;
 
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
 
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
 
//Execute the request
$result = curl_exec($ch);

/*
playing around with other methods I found on stack overflow  
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { 


}

var_dump($result);

/*

// still trying figure out the error malformed JSON 