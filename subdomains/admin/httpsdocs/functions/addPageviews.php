<?php
	
	function clientIpAddress() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$address = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$address = $_SERVER['REMOTE_ADDR'];
		}
		return $address;
	}
	
	$ipAddress = clientIpAddress();
	
	$url = "https://ipgeolocation.abstractapi.com/v1?api_key=5ee5af5a888b4d87afb8d7a69cf97037&ip_address=$ipAddress&fields=city,country,longitude,latitude";
	
	$fullURL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$lastFolder = basename(dirname($_SERVER['REQUEST_URI']));
	if (empty($lastFolder)) {
		$lastFolder = "Home"; // Als er geen map is, gebruik "Home"
	} else {
		$lastFolder = ucfirst($lastFolder); // Maak de eerste letter hoofdletter
	}
	
	// Initialiseer cURL.
	$ch = curl_init();
	
	// Set the URL that you want to GET by using the CURLOPT_URL option.
	curl_setopt($ch, CURLOPT_URL, $url);
	
	// Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	// Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	
	// Execute the request.
	$data = curl_exec($ch);
	
	// Close the cURL handle.
	curl_close($ch);
	
	$response = json_decode($data, true);
	
	// Haal de gewenste waarden uit het array
	$latitude = $response['latitude'];
	$longitude = $response['longitude'];
	$city = $response['city'];
	$country = $response['country'];
	
	// Combineer latitude en longitude tot een enkele string in de vorm "latitude, longitude"
	$coords = $response['latitude'] . ', ' . $response['longitude'];
	
	$userAgent = $_SERVER['HTTP_USER_AGENT'];
	
	// Definieer een array met de patronen van de browsers die je wilt herkennen
	$browserPatterns = [
		'/msie/i'           =>     'IE',                   // Internet Explorer
		'/trident/i'        =>     'IE 11',                // Internet Explorer 11
		'/edge/i'           =>     'Edge',                 // Microsoft Edge
		'/chrome/i'         =>     'Chrome',               // Google Chrome
		'/firefox/i'        =>     'Firefox',              // Mozilla Firefox
		'/safari/i'         =>     'Safari',               // Apple Safari
		'/opera/i'          =>     'Opera',                // Opera
		'/opr/i'            =>     'Opera Mini',           // Opera Mini (voor mobiele apparaten)
		'/ucbrowser/i'      =>     'Uc',                   // UC Browser
		'/konqueror/i'      =>     'Conq (linux)',         // Konqueror (Linux)
		'/mobile/i'         =>     'Mobiel',               // Andere mobiele browsers
		'/ucweb/i'          =>     'UCweb',                // UC Browser (oude versies)
		'/SamsungBrowser/i' =>     'Samsung',              // Samsung Internet Browser
		'/brave/i'          =>     'Brave',                // Brave Browser
		'/maxthon/i'        =>     'Maxton',               // Maxthon Browser
		'/vivaldi/i'        =>     'Vivaldi',              // Vivaldi Browser
		'/puffin/i'         =>     'p-Puffin',             // Puffin Browser
		'/chromium/i'       =>     'Chromium',             // Chromium Browser (niet Chrome)
		'/avast/i'          =>     'Avast',                // Avast Secure Browser
		'/flock/i'          =>     'Flock',                // Flock Browser
		'/silk/i'           =>     'Slick',                // Amazon Silk Browser
		'/lynx/i'           =>     'Lynx',                 // Lynx Browser (tekstbrowser)
		'/seamonkey/i'      =>     'Seamonkey'             // SeaMonkey Browser
	];
	
	
	foreach ($browserPatterns as $pattern => $browser) {
		if (preg_match($pattern, $userAgent)) {
			// Als er een overeenkomst is, sla de gevonden browsernaam op en stop de loop
			$detectedBrowser = $browser;
			break;
		}
	}
	
	
	$sql = "INSERT INTO `pageviews` (`ip_adres`, `coordinaten`, `stad`, `land`, `user_agent`, `pagina`, `tijdstip`) VALUES ('$ipAddress', '$coords', '$city', '$country', '$detectedBrowser', '$lastFolder', NOW())";
	if ($conn->query($sql) === TRUE) {
		//echo "Gegevens zijn succesvol toegevoegd aan de database.";
	} else {
		//Echo "Fout bij het toevoegen van gegevens: " . $conn->error;
	}
	