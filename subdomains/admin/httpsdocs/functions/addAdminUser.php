<?php
// registerUser.php
	
	require('../ini.inc');
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$naam = $_POST['naam'];
		$gebruikersnaam = $_POST['gebruikersnaam'];
		$email = $_POST['email'];
		$paswoord = $_POST['paswoord'];
		$rol = $_POST['rol'];
		
		
		// Controleer of de gebruikersnaam of email al bestaan in de database
		$check_query = "SELECT COUNT(*) FROM `adminusers` WHERE `admin_gebruikersnaam` = ? OR `admin_email` = ?";
		$check_stmt = mysqli_prepare($conn, $check_query);
		mysqli_stmt_bind_param($check_stmt, 'ss', $gebruikersnaam, $email);
		mysqli_stmt_execute($check_stmt);
		mysqli_stmt_bind_result($check_stmt, $count);
		mysqli_stmt_fetch($check_stmt);
		mysqli_stmt_close($check_stmt);
		
		if ($count > 0) {
			$response = array('status' => 'failure', 'message' => 'Username or email already exists.');
			header('Content-Type: application/json');
			echo json_encode($response);
			exit;
		}
		
		// Als ze uniek zijn --> Insert
		$query = "INSERT INTO `adminusers`
              (`admin_naam`, `admin_gebruikersnaam`, `admin_email`, `admin_wachtwoord`, `admin_rol`)
              VALUES (?, ?, ?, ?, ?)";
		
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'sssss',
			$naam,
			$gebruikersnaam,
			$email,
			$paswoord,
			$rol
		);
		mysqli_stmt_store_result($stmt);
		
		if (mysqli_stmt_execute($stmt)) {
			// Gebruik mysqli_stmt_affected_rows om het aantal ingevoegde rijen te controleren
			if (mysqli_stmt_affected_rows($stmt) > 0) {
				$response = array('status' => 'success', 'message' => 'You are registered!');
			} else {
				$response = array('status' => 'failure', 'message' => 'Input failed.');
			}
		} else {
			$response = array('status' => 'failure', 'message' => 'Input failed: ' . mysqli_error($conn));
		}
		mysqli_stmt_close($stmt);
		
		// Stuur de respons terug als JSON
		header('Content-Type: application/json');
		echo json_encode($response);
		exit;
	}

		
	
