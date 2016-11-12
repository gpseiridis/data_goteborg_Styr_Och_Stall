<?php

$stationID= $_POST["availableStations"];


switch ($stationID) {
    case "all":
        allStations();
        break;
        default;        
        specificStation($stationID);

    break;
}


function apiCall() {
    $url ="http://data.goteborg.se/StyrOchStall/v0.1/GetBikeStations/";
	$key = "bbfb13cc-994c-4a5a-924e-85a5760b6e4c";
	$format="?format=json";
	$api_call = $url.$key.$format;
	echo $api_call;
	$jsondata = file_get_contents($api_call);
	$json = json_decode($jsondata, true);
}



function allStations() {
    
	$url ="http://data.goteborg.se/StyrOchStall/v0.1/GetBikeStations/";
	$key = "bbfb13cc-994c-4a5a-924e-85a5760b6e4c";
	$format="?format=json";
	$api_call = $url.$key.$format;
	$jsondata = file_get_contents($api_call);
	$json = json_decode($jsondata, true);
    $output = "<ul>";

		//extracting date in human readable form
$php_timestamp =  $json['TimeStamp'];
$php_timestamp_stripped= strstr($php_timestamp, '+', true);
$php_timestamp_stripped= substr($php_timestamp_stripped,6);
$epoch = intval($php_timestamp_stripped);
$epoch = $php_timestamp_stripped/1000;
$created_on = date('r', $epoch);

echo "<h1> Created on ".$created_on."</h1>";
	foreach ($json['Stations'] as $station ) {
	
	$output .= "<h4> STATION: " .$station['Label']."</h4>";
	$output .= "<li> Capacity: " .$station['Capacity']."</li>";
	$output .= "<li> Available Bikes: " .$station['FreeBikes']."</li>";
	$output .= "<li> Available stands: " .$station['FreeStands']."</li>";
	$output .= "<li> Current status: " .$station['State']."</li>";

	}

	$output.="</ul>";
	echo $output;
}

function specificStation($id){

	$url ="http://data.goteborg.se/StyrOchStall/v0.1/GetBikeStations/";
	$key = "bbfb13cc-994c-4a5a-924e-85a5760b6e4c";
	$format="?format=json";
	$api_call = $url.$key.$format;	
	
	$jsondata = file_get_contents($api_call);
	$json = json_decode($jsondata, true);
    $output = "<ul>";
	//extracting date in human readable form
$php_timestamp =  $json['TimeStamp'];
$php_timestamp_stripped= strstr($php_timestamp, '+', true);
$php_timestamp_stripped= substr($php_timestamp_stripped,6);
$epoch = intval($php_timestamp_stripped);
$epoch = $php_timestamp_stripped/1000;
$created_on = date('r', $epoch);
echo "<h1> Created on ".$created_on."</h1>";


	$output .= "<h4> STATION: " .$json['Stations'][$id]['Label']."</h4>";
	$output .= "<li> Capacity: " .$json['Stations'][$id]['Capacity']."</li>";
	$output .= "<li> Available Bikes: " .$json['Stations'][$id]['FreeBikes']."</li>";
	$output .= "<li> Available stands: " .$json['Stations'][$id]['FreeStands']."</li>";
	$output .= "<li> Current status: " .$json['Stations'][$id]['State']."</li>";


	$output.="</ul>";
	echo $output;

	
}

