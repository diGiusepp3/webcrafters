<?php
// logout.php
	session_start();
	
	// Clear session variables
	$_SESSION = array();
	
	// Destroy the session
	session_destroy();
	
	$response = array('Uitloggen' => 'succesvol');
	header('Content-Type: application/json');
	echo json_encode($response);
	exit;

