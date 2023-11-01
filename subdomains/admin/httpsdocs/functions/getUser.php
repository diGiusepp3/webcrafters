<?php
	// getUser.php

	require ('../ini.inc');
	
	// Check if the username and password were submitted
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// Prepare the SQL query to prevent SQL injection
		$query = "SELECT `admin_id` FROM `adminusers` WHERE admin_gebruikersnaam = ? AND admin_wachtwoord = ?";
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, "ss", $username, $password);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		
		// If a matching row is found, set session variables and send 'success' response
		if (mysqli_stmt_num_rows($stmt) > 0) {
			
			$response = array('status' => 'success', 'message' => 'You are logged in!');
			
		} else {
			$response = array('status' => 'failure', 'message' => 'Invalid credentials');
		}
		mysqli_stmt_close($stmt);
	} else {
		$response = array('status' => 'failure', 'message' => 'Unknown error: Please contact us if this issue persists.');
	}
	
	// Send the response back as JSON
	header('Content-Type: application/json');
	echo json_encode($response);
	exit;

