<?php
	// ini.inc
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	
	$servername = "localhost";
	$username = "webcrafters.be";
	$password = "DigiuSeppe2018___";
	$database = "webcrafters.be-dev";
	
	$conn = new mysqli($servername, $username, $password, $database);

	if ($conn->connect_error) {
		die("Databaseverbinding mislukt: " . $conn->connect_error);
	}
	
	//$config["paths"]["user_icons"] = "{$_SERVER["DOCUMENT_ROOT"]}/uploads/user_icons";



