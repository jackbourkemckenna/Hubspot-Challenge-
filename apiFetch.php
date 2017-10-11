<?php
$curl = curl_init();
// used post man to get the json data 

curl_setopt_array($curl, array(
    CURLOPT_URL => "TESTURL",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 5fabb6fd-b95a-36db-8a2f-09de41ae7196"
    )
));

$response = curl_exec($curl);
$err      = curl_error($curl);

curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    
    $jsonData = json_decode($response, true);
    
}


//made a foreach loop to loop through the partners array and place that data into my vars 


foreach ($jsonData['partners'] as $item) {
    $country    = $item['country'];
    $firstNames = $item['firstName'] . "<br>";
    //echo $country . ' --' . $firstNames;  // if you un comment these you will be shown the data on in a nice format 
    $dates1     = $item['availableDates'];
    // I had a lot of trouble getting the dates so I made a for loop and a counter to count through this and get the data needed
    
    for ($i = 0; $i < count($dates1); $i++) {
        // echo $dates1[$i] . "<br>";  // same as line 38 displaying data neatly
    }
    //I've never made a post request always delt with get so this is very new to me this is the best solution I could come up with in the alloted amount of time. 
    // I'll be sending this data over to postJson.php 
    // I have a feeling I am passing my data wrongly in the line below I need to do more reseach on how to put and send json data
    $finalPostArray = json_encode(array(
        'country' => $country,
        'firstName' => $firstNames,
        'dates' => $dates1,
        'dates' => $dates1
    ));
    
    
    
    
}