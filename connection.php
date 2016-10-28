<?php
	// Create a database connection
	$connection = new mysqli("localhost", "root", "", "lassanaparty");
	
	if (!$connection) {
		die("Database connection failed: " . $connection->connect_error);
	}
?>