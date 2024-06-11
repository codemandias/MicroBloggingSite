<!-- Connects the database -->

<?php
	$hostservername = "db.cs.dal.ca";
	$username = "aditya";
	$password = "QgdHp6UN3VQaWAsrz9m92ZwY6";
	$dbname = "aditya";
	
	$dbconnection = new mysqli($hostservername, $username, $password, $dbname);

	//Checks if there is a connection error
	if ($dbconnection->connect_error) {
		die("Sorry, There was an error connecting to the database.");
	} else {
		//echo "<h1>Connected!</h1>";
	}

?>
