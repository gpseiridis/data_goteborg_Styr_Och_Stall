<?php
$host ="http://data.goteborg.se/";
$api = "StyrOchStall/v0.1/GetBikeStations/";
$key = "bbfb13cc-994c-4a5a-924e-85a5760b6e4c";
$format="?format=json";
$api_call=$host.$api.$key.$format;

try {
	$jsondata = file_get_contents($api_call);
	 if($jsondata==false)
  	{
     throw new Exception( 'Something really gone wrong');  
 	 }
} catch (Exception $e) {
	echo "Oops! There has been an error loading the data... please try again later";
	header("Location: error.php"); 

}

$json = json_decode($jsondata, true);
$output = "<ul>";

//extracting date in human readable form
$php_timestamp =  $json['TimeStamp'];
$php_timestamp_stripped= strstr($php_timestamp, '+', true);
$php_timestamp_stripped= substr($php_timestamp_stripped,6);
$epoch = intval($php_timestamp_stripped);
$epoch = $php_timestamp_stripped/1000;
$created_on = date('r', $epoch);
