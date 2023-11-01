<?php
	
	session_start();
	
	if (isset($_POST['username'])) {
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $_POST['username'];
		
		$response = array('status' => 'success');
	} else {
		$response = array('status' => 'failure', 'message' => 'Username not provided.');
	}
	
	// Send the response back as JSON
	header('Content-Type: application/json');
	echo json_encode($response);
	exit;

