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


function allStations() {

    
	require_once('apicall.php');


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

require_once('apicall.php');

echo "<h1> Created on ".$created_on."</h1>";


	$output .= "<h4> STATION: " .$json['Stations'][$id]['Label']."</h4>";
	$output .= "<li> Capacity: " .$json['Stations'][$id]['Capacity']."</li>";
	$output .= "<li> Available Bikes: " .$json['Stations'][$id]['FreeBikes']."</li>";
	$output .= "<li> Available stands: " .$json['Stations'][$id]['FreeStands']."</li>";
	$output .= "<li> Current status: " .$json['Stations'][$id]['State']."</li>";


	$output.="</ul>";
	echo $output;

	
}

