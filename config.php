<?php
   
	$dbhost = 'localhost';
	$dbuser = 'id6669496_christina';
	$dbpass = 'freideriki1988';
	$dbname = 'id6669496_gamedb';
    
	// Create connection klasi tis phpS
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if ($conn->connect_error) {
         mysqli_error($stmt_rand);
         //Ama proklithi sfalma me to die i efarmogi stamatai na paizei
		die("Connection failed: " . $conn->connect_error);
	}
?>