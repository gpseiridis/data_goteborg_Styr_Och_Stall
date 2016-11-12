</!DOCTYPE html>
<html>
<head>
	<title>Styr Och Stall</title>
</head>
<body>
 <div align="center">
 <h1> Select a station</h1>



	

 <form name="myform" action="display.php" method="POST">
	
		<select name="availableStations">
			<option value="all">All</option>
			<?php 
				$array = explode( "\n", file_get_contents( "availableStations.php" ) );
				$array_length = sizeof($array);
			for ($i=0; $i < $array_length; $i++) { ?>	
					

			<option value="<?php echo $i; ?>" >  <?php echo $array[$i]; ?>   </option>
			<?php } ?>
		</select>
			

		<input type="submit" value="Submit">
	</form>
</div>

</body>
</html>