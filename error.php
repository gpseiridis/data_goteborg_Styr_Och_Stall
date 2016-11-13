<!DOCTYPE html>
<html>
<head>
	<title>oops!</title>
</head>
<body>
<h1> Unfortunately there has been an error </h1>

<h3><a href="index.php">click here to go back, or wait until the browser redirects you back </a></h3>

</body>
</html>
<?php

//will redirect to main page in 3 seconds
header('Refresh: 3;url=index.php');


?>