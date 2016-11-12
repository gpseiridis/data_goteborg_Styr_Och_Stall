<?php


$jsondata = file_get_contents('http://data.goteborg.se/StyrOchStall/v0.1/GetBikeStations/bbfb13cc-994c-4a5a-924e-85a5760b6e4c?format=json');
$json = json_decode($jsondata, true);
$output = "<ul>";
$php_timestamp =  $json['TimeStamp'];

//getting timestamp in readable form
$php_timestamp_stripped= strstr($php_timestamp, '+', true);
$php_timestamp_stripped= substr($php_timestamp_stripped,6);
$php_timestamp_date = date("d F Y", $php_timestamp_stripped);

echo "The timestamp in a readable format is ".$php_timestamp_date."";
echo "<h1> Created on ".$php_timestamp_date."</h1>";

foreach ($json['Stations'] as $station ) {
	
	$output .= "<h4> STATION: " .$station['Label']."</h4>";
	$output .= "<li> Capacity: " .$station['Capacity']."</li>";
	$output .= "<li> Available Bikes: " .$station['FreeBikes']."</li>";
	$output .= "<li> Available stands: " .$station['FreeStands']."</li>";
	$output .= "<li> Current status: " .$station['State']."</li>";


}

	$output.="</ul>";
	echo $output;


