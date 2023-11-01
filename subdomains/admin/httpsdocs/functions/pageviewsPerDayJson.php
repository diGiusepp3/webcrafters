<?php
	
	require("{$_SERVER["DOCUMENT_ROOT"]}/ini.inc");
	
	function getPageviewsPerDayCurrentWeek($conn)
	{
		// Haal het huidige jaar en weeknummer op
		$year = date('Y');
		$weekNumber = date('W');
		
		// Bereken de start- en einddatum van de huidige week
		$currentWeekStart = date('Y-m-d', strtotime("{$year}-W{$weekNumber}-1"));
		$currentWeekEnd = date('Y-m-d', strtotime("{$year}-W{$weekNumber}-7"));
		
		// Query om pageviews per dag op te halen voor de huidige week
		$sqlPageviewsPerDay = "SELECT DATE(`tijdstip`) AS `date`, COUNT(`id`) AS `pageviews_count` FROM `pageviews` WHERE `tijdstip` BETWEEN '$currentWeekStart' AND '$currentWeekEnd' GROUP BY DATE(`tijdstip`)";
		
		// Voer de query uit
		$resultPageviewsPerDay = $conn->query($sqlPageviewsPerDay);
		
		// Initialiseer een array om de pageviews per dag op te slaan
		$pageviewsPerDay = array();
		
		// Loop door de queryresultaten en sla gegevens op in de array
		while ($row = $resultPageviewsPerDay->fetch_assoc()) {
			$date = $row['date'];
			$dayOfWeek = date('l', strtotime($date)); // Krijg de dag van de week
			$pageviewsCount = $row['pageviews_count'];
			
			// Sla de gegevens op in de array met de dag van de week als sleutel
			$pageviewsPerDay[$dayOfWeek] = $pageviewsCount;
		}
		
		return $pageviewsPerDay;
	}

// Verbinding maken met de database
	
	if ($conn->connect_error) {
		die("Verbindingsfout: " . $conn->connect_error);
	}

// Haal de pageviews per dag voor de huidige week op
	$pageviewsPerDayCurrentWeek = getPageviewsPerDayCurrentWeek($conn);

// Sluit de databaseverbinding
	$conn->close();

// Zet de resultaten om naar JSON en geef ze terug als respons
	header('Content-Type: application/json');
	echo json_encode($pageviewsPerDayCurrentWeek);

