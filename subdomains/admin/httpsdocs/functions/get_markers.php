<?php
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/ini.inc");
	
	$sql = "SELECT coordinaten, stad, land FROM pageviews";
	$result = $conn->query($sql);
	
	$markers = array();
	
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			// Verwerk elke rij en voeg deze toe aan de $markers array
			$coords = explode(",", $row["coordinaten"]);
			$name = $row["stad"] . ", " . $row["land"];
			$marker = array('coords' => $coords, 'name' => $name);
			$markers[] = $marker;
		}
	}
	
	header('Content-Type: application/json');
	echo json_encode($markers);