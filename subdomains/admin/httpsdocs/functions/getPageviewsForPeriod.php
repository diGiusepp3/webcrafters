<?php
	require ("{$_SERVER["DOCUMENT_ROOT"]}/ini.inc");
	function getPageviewsForPeriod($conn, $timestamp) {
		// Bereken het jaar, weeknummer en maand van het gegeven tijdstip
		$year = date('Y', strtotime($timestamp));
		$weekNumber = date('W', strtotime($timestamp));
		$month = date('m', strtotime($timestamp));
		
		// Bereken de start- en einddatum van de huidige week
		$currentWeekStart = date('Y-m-d', strtotime("{$year}-W{$weekNumber}-1"));
		$currentWeekEnd = date('Y-m-d', strtotime("{$year}-W{$weekNumber}-7"));
		
		// Bereken de start- en einddatum van de vorige week
		$lastWeekStart = date('Y-m-d', strtotime("{$year}-W" . ($weekNumber - 1) . "-1"));
		$lastWeekEnd = date('Y-m-d', strtotime("{$year}-W" . ($weekNumber - 1) . "-7"));
		
		// Bereken de start- en einddatum van vorig jaar
		$lastYearStart = date('Y-m-d', strtotime("-1 year", strtotime("{$year}-01-01")));
		$lastYearEnd = date('Y-m-d', strtotime("-1 year", strtotime("{$year}-12-31")));
		
		// Bereken de start- en einddatum van de vorige maand
		$lastMonthStart = date('Y-m-01', strtotime('-1 month', strtotime($timestamp)));
		$lastMonthEnd = date('Y-m-t', strtotime('-1 month', strtotime($timestamp)));
		
		// Query om pageviews op te halen voor elk van de perioden
		$sqlAll = "SELECT COUNT(`id`) AS `pageviews_count` FROM `pageviews`";
		$sqlCurrentWeek = "SELECT COUNT(`id`) AS `current_week_pageviews` FROM `pageviews` WHERE `tijdstip` BETWEEN '$currentWeekStart' AND '$currentWeekEnd'";
		$sqlLastWeek = "SELECT COUNT(`id`) AS `last_week_pageviews` FROM `pageviews` WHERE `tijdstip` BETWEEN '$lastWeekStart' AND '$lastWeekEnd'";
		$sqlLastYear = "SELECT COUNT(`id`) AS `last_year_pageviews` FROM `pageviews` WHERE `tijdstip` BETWEEN '$lastYearStart' AND '$lastYearEnd'";
		$sqlThisMonth = "SELECT COUNT(`id`) AS `this_month_pageviews` FROM `pageviews` WHERE `tijdstip` BETWEEN '$lastMonthEnd' AND NOW()";
		$sqlLastMonth = "SELECT COUNT(`id`) AS `last_month_pageviews` FROM `pageviews` WHERE `tijdstip` BETWEEN '$lastMonthStart' AND '$lastMonthEnd'";
		$sqlThisYear = "SELECT COUNT(`id`) AS `this_year_pageviews` FROM `pageviews` WHERE `tijdstip` BETWEEN '$lastYearEnd' AND NOW()";
		
		// Voer de queries uit
		$resultAll = $conn->query($sqlAll);
		$resultCurrentWeek = $conn->query($sqlCurrentWeek);
		$resultLastWeek = $conn->query($sqlLastWeek);
		$resultLastYear = $conn->query($sqlLastYear);
		$resultThisMonth = $conn->query($sqlThisMonth);
		$resultLastMonth = $conn->query($sqlLastMonth);
		$resultThisYear = $conn->query($sqlThisYear);
		
		// Haal de aantallen op en retourneer ze
		$allpageviews = $resultAll->fetch_assoc()['pageviews_count'];
		$currentWeekPageviews = $resultCurrentWeek->fetch_assoc()['current_week_pageviews'];
		$lastWeekPageviews = $resultLastWeek->fetch_assoc()['last_week_pageviews'];
		$lastYearPageviews = $resultLastYear->fetch_assoc()['last_year_pageviews'];
		$thisMonthPageviews = $resultThisMonth->fetch_assoc()['this_month_pageviews'];
		$lastMonthPageviews = $resultLastMonth->fetch_assoc()['last_month_pageviews'];
		$thisYearPageviews = $resultThisYear->fetch_assoc()['this_year_pageviews'];
		
		return array(
			'all' => $allpageviews,
			'current_week' => $currentWeekPageviews,
			'last_week' => $lastWeekPageviews,
			'last_year' => $lastYearPageviews,
			'this_month' => $thisMonthPageviews,
			'last_month' => $lastMonthPageviews,
			'this_year' => $thisYearPageviews
		);
	}
	
	function calculatePercentageChange($previousValue, $currentValue): float|int
	{
		if ($previousValue == 0) {
			return 0;
		}
		
		$percentageChange = (($currentValue - $previousValue) / abs($previousValue)) * 100;
		return round($percentageChange, 2);
	}


	// Voorbeeldgebruik:
	$timestamp = date('Y-m-d H:i:s');
	$pageviewsData = getPageviewsForPeriod($conn, $timestamp);


	
	
	if (isset($_COOKIE['dev'])) {
		echo "Pageviews deze week: " . $pageviewsData['current_week'] . "<br>";
		echo "Pageviews vorige week: " . $pageviewsData['last_week'] . "<br>";
		echo "Pageviews vorig jaar: " . $pageviewsData['last_year'] . "<br>";
		echo "Pageviews deze maand: " . $pageviewsData['this_month'] . "<br>";
		echo "Pageviews vorige maand: " . $pageviewsData['last_month'] . "<br>";
		echo "Pageviews dit jaar: " . $pageviewsData['this_year'] . "<br>";
	}
 