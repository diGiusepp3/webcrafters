<?php
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/ini.inc");
	
	$browserCounts = array();
	
	$sql = "SELECT user_agent FROM pageviews";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$userAgent = $row['user_agent'];
			if (!isset($browserCounts[$userAgent])) {
				$browserCounts[$userAgent] = 1;
			} else {
				// Als de browser al in de array staat, verhoog de telling met 1
				$browserCounts[$userAgent]++;
			}
		}
	}
	
	// Zet de resultaten om naar JSON en geef deze terug
	header('Content-Type: application/json');
	echo json_encode($browserCounts);


	
	