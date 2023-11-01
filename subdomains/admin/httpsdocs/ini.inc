<?php

// Maak verbinding met de database
	$servername = "localhost";
	$username = "webcrafters.be";
	$password = "DigiuSeppe2018___";
	$dbname = "webcrafters.be";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    echo"Connectie mislukt";
	} else {
		//echo"Connectie gelukt";
	}

	
// Error reporting
	ini_set("display_errors", "On"); # Display errors
	error_reporting(E_ALL); # Set error_reporting
	
/* Credits */
	$developerName = 'Matthias Gielen \n';
	$developerRole = 'Ontwikkelaar';
	$developerWebsite = 'https://www.webcrafters.be';
	$developerEmail = 'info@webcrafters.be';

# Zet de locale voor datum en tijd naar Nederlands (Belgie)
	setlocale(LC_TIME, "nl_BE.ISO8859-1");

// Long date format (1 januari 2023)
	$dateLong = new IntlDateFormatter(
		"nl_BE",
		IntlDateFormatter::FULL,
		IntlDateFormatter::FULL,
		"Europe/Brussels",
		IntlDateFormatter::GREGORIAN,
		"d MMMM Y"
	);

// Full date format (maandag 1 januari 2023)
	$dateFull = new IntlDateFormatter(
		"nl_BE",
		IntlDateFormatter::FULL,
		IntlDateFormatter::FULL,
		"Europe/Brussels",
		IntlDateFormatter::GREGORIAN,
		"EEEE d MMMM Y"
	);
	
	
	
	
	
	
	
	
	
	