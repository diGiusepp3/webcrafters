<?php

// registerUser.php
	
	require('../ini.inc');
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$naam = $_POST['naam'];
		//$achternaam = $_POST['achternaam'];
		//$geslacht = $_POST['geslacht'];
		//$geboortedatum = date('Y-m-d', strtotime($_POST['geboortedatum']));
		$gebruikersnaam = $_POST['gebruikersnaam'];
		$email = $_POST['email'];
		$paswoord = $_POST['paswoord'];
		$rol = $_POST['rol'];
		//$straat = $_POST['straat'];
		//$huisnummer = $_POST['huisnummer'];
		//$postcode = $_POST['postcode'];
		//$gemeente = $_POST['gemeente'];
		//$land = $_POST['land'];
		//$geregistreerd = date('Y-m-d H:i:s');
		
		// Check if the username or email already exist in the database
		$check_query = "SELECT COUNT(*) FROM `adminusers` WHERE `gebruikersnaam` = ? OR `email` = ?";
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
		
		// If the username and email are unique, proceed with the insertion
		$query = "INSERT INTO `normal_users`
              (`naam`, `achternaam`, `geslacht`, `geboortedatum`, `gebruikersnaam`, `email`, `wachtwoord`, `straat`, `huisnummer`, `postcode`,`gemeente`, `land`)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'ssssssssssss',
			$naam,
			$achternaam,
			$geslacht,
			$geboortedatum,
			$gebruikersnaam,
			$email,
			$paswoord,
			$straat,
			$huisnummer,
			$postcode,
			$gemeente,
			$land
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
