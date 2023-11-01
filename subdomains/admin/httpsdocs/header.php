<?php
	
echo"
<!DOCTYPE html>
<html lang='nl'>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
	<meta name='author' content='Webcrafters'>
	<link rel='preconnect' href='https://fonts.gstatic.com'>
	<link rel='shortcut icon' href='/img/icons/favicon.ico' />";
	
	// Title
	if (isset($title)) {
		echo "<title>$title</title>";
	} else {
		echo "<title>Default Title</title>";
	}
	
	// Keywords
	if (isset($keywords)) {
		if (is_array($keywords)) {
			$keywords = implode(', ', $keywords);
			echo "<meta name='keywords' content='$keywords'>";
		} else {
			echo "<meta name='keywords' content='$keywords'>";
		}
	} else {
		echo "<meta name='keywords' content='Geen keywords!'>";
	}
	
	// Description
	if (isset($description)) {
		echo "<meta name='description' content='$description'>";
	} else {
		echo "<meta name='description' content='Geen beschrijving?'>";
	}
	
	// Bodyclass for styling purposes
	$bodyClass = str_replace(' ', '-', $title);
	
	
	echo"
	<!-- jQuery -->
	<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>

	<!-- Flatpickr -->
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css'>
	<script src='https://cdn.jsdelivr.net/npm/flatpickr'></script>

	<!-- leaflet -->
	<link rel='stylesheet' href='/leaflet/leaflet.min.css'>
	
	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap' rel='stylesheet'>
	
	<!-- Standard stylesheets -->
	<link href='/css/app.css' rel='stylesheet'>
	<link href='/css/style.css' rel='stylesheet'>
	
	<!-- Kalender -->
	<script src='/scripts/dateTimePicker.js'></script>
	
</head>";

echo"
<body>
	<div class='wrapper'>
		<nav id='sidebar' class='sidebar js-sidebar'>
			<div class='sidebar-content js-simplebar'>
				<a class='sidebar-brand' href='/index.html'>
		          <span class='align-middle'>&lt; Webcrafters /&gt;</span>
		        </a>

				<ul class='sidebar-nav'>
					<li class='sidebar-header'>
						Pages
					</li>

					<li class='sidebar-item active'>
						<a class='sidebar-link' href='/index.html'>
						  <i class='align-middle' data-feather='sliders'></i> <span class='align-middle'>Dashboard</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='/pages/profile.php'>
						  <i class='align-middle' data-feather='user'></i> <span class='align-middle'>Profiel</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='/pages/login.php'>
						  <i class='align-middle' data-feather='log-in'></i> <span class='align-middle'>Log in</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='/pages/adminRegister.php'>
						  <i class='align-middle' data-feather='user-plus'></i> <span class='align-middle'>Registreer</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='/pages/appointments.php'>
						  <i class='align-middle' data-feather='book'></i> <span class='align-middle'>Afspraken</span>
						</a>
					</li>

					<li class='sidebar-header'>
						Tools & Components
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='ui-buttons.php'>
						  <i class='align-middle' data-feather='square'></i> <span class='align-middle'>Knoppen</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='ui-forms.php'>
						  <i class='align-middle' data-feather='check-square'></i> <span class='align-middle'>Formulieren</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='ui-cards.php'>
						  <i class='align-middle' data-feather='grid'></i> <span class='align-middle'>Cards</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='ui-typography.php'>
						  <i class='align-middle' data-feather='align-left'></i> <span class='align-middle'>Typography</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='icons-feather.php'>
						  <i class='align-middle' data-feather='coffee'></i> <span class='align-middle'>Iconen</span>
						</a>
					</li>

					<li class='sidebar-header'>
						Plugins & Addons
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='charts-chartjs.php'>
						  <i class='align-middle' data-feather='bar-chart-2'></i> <span class='align-middle'>Grafieken</span>
						</a>
					</li>

					<li class='sidebar-item'>
						<a class='sidebar-link' href='/maps-google.php'>
						  <i class='align-middle' data-feather='map'></i> <span class='align-middle'>Maps</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>";
		
		echo"
		<div class='main'>
			<nav class='navbar navbar-expand navbar-light navbar-bg'>
				<a class='sidebar-toggle js-sidebar-toggle'>
				  <i class='hamburger align-self-center'></i>
				</a>

				<div class='navbar-collapse collapse'>
					<ul class='navbar-nav navbar-align'>
						<li class='nav-item dropdown'>
							<a class='nav-icon dropdown-toggle' href='#' id='alertsDropdown' data-bs-toggle='dropdown'>
								<div class='position-relative'>
									<i class='align-middle' data-feather='bell'></i>
									<span class='indicator'>4</span>
								</div>
							</a>
							
							<div class='dropdown-menu dropdown-menu-lg dropdown-menu-end py-0' aria-labelledby='alertsDropdown'>
								<div class='dropdown-menu-header'>
									4 New Notifications
								</div>
								<div class='list-group'>
									<a href='#' class='list-group-item'>
										<div class='row g-0 align-items-center'>
											<div class='col-2'>
												<i class='text-danger' data-feather='alert-circle'></i>
											</div>
											<div class='col-10'>
												<div class='text-dark'>Update completed</div>
												<div class='text-muted small mt-1'>Restart server 12 to complete the update.</div>
												<div class='text-muted small mt-1'>30m ago</div>
											</div>
										</div>
									</a>
									<a href='#' class='list-group-item'>
										<div class='row g-0 align-items-center'>
											<div class='col-2'>
												<i class='text-warning' data-feather='bell'></i>
											</div>
											<div class='col-10'>
												<div class='text-dark'>Lorem ipsum</div>
												<div class='text-muted small mt-1'>Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class='text-muted small mt-1'>2h ago</div>
											</div>
										</div>
									</a>
									<a href='#' class='list-group-item'>
										<div class='row g-0 align-items-center'>
											<div class='col-2'>
												<i class='text-primary' data-feather='home'></i>
											</div>
											<div class='col-10'>
												<div class='text-dark'>Login from 192.186.1.8</div>
												<div class='text-muted small mt-1'>5h ago</div>
											</div>
										</div>
									</a>
									<a href='#' class='list-group-item'>
										<div class='row g-0 align-items-center'>
											<div class='col-2'>
												<i class='text-success' data-feather='user-plus'></i>
											</div>
											<div class='col-10'>
												<div class='text-dark'>New connection</div>
												<div class='text-muted small mt-1'>Christina accepted your request.</div>
												<div class='text-muted small mt-1'>14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class='dropdown-menu-footer'>
									<a href='#' class='text-muted'>Show all notifications</a>
								</div>
							</div>
						</li>
						<li class='nav-item dropdown'>
							<a class='nav-icon dropdown-toggle' href='#' id='messagesDropdown' data-bs-toggle='dropdown'>
								<div class='position-relative'>
									<i class='align-middle' data-feather='message-square'></i>
								</div>
							</a>
							<div class='dropdown-menu dropdown-menu-lg dropdown-menu-end py-0' aria-labelledby='messagesDropdown'>
								<div class='dropdown-menu-header'>
									<div class='position-relative'>
										4 New Messages
									</div>
								</div>
								<div class='list-group'>
									<a href='#' class='list-group-item'>
										<div class='row g-0 align-items-center'>
											<div class='col-2'>
												<img src='/img/avatars/avatar-5.jpg' class='avatar img-fluid rounded-circle' alt='Vanessa Tucker'>
											</div>
											<div class='col-10 ps-2'>
												<div class='text-dark'>Vanessa Tucker</div>
												<div class='text-muted small mt-1'>Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class='text-muted small mt-1'>15m ago</div>
											</div>
										</div>
									</a>
									<a href='#' class='list-group-item'>
										<div class='row g-0 align-items-center'>
											<div class='col-2'>
												<img src='/img/avatars/avatar-2.jpg' class='avatar img-fluid rounded-circle' alt='William Harris'>
											</div>
											<div class='col-10 ps-2'>
												<div class='text-dark'>William Harris</div>
												<div class='text-muted small mt-1'>Curabitur ligula sapien euismod vitae.</div>
												<div class='text-muted small mt-1'>2h ago</div>
											</div>
										</div>
									</a>
									<a href='#' class='list-group-item'>
										<div class='row g-0 align-items-center'>
											<div class='col-2'>
												<img src='/img/avatars/avatar-4.jpg' class='avatar img-fluid rounded-circle' alt='Christina Mason'>
											</div>
											<div class='col-10 ps-2'>
												<div class='text-dark'>Christina Mason</div>
												<div class='text-muted small mt-1'>Pellentesque auctor neque nec urna.</div>
												<div class='text-muted small mt-1'>4h ago</div>
											</div>
										</div>
									</a>
									<a href='#' class='list-group-item'>
										<div class='row g-0 align-items-center'>
											<div class='col-2'>
												<img src='/img/avatars/avatar-3.jpg' class='avatar img-fluid rounded-circle' alt='Sharon Lessman'>
											</div>
											<div class='col-10 ps-2'>
												<div class='text-dark'>Sharon Lessman</div>
												<div class='text-muted small mt-1'>Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class='text-muted small mt-1'>5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class='dropdown-menu-footer'>
									<a href='#' class='text-muted'>Show all messages</a>
								</div>
							</div>
						</li>
						<li class='nav-item dropdown'>
							<a class='nav-icon dropdown-toggle d-inline-block d-sm-none' href='#' data-bs-toggle='dropdown'>
								<i class='align-middle' data-feather='settings'></i>
							</a>

							<a class='nav-link dropdown-toggle d-none d-sm-inline-block' href='#' data-bs-toggle='dropdown'>";
							
								if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === true) {
								    $username = $_SESSION['username'];
								    $sql = "SELECT `image` FROM `adminusers` WHERE `admin_gebruikersnaam` = '$username'";
								    $result = $conn->query($sql);  // Execute the query
								
								    if ($result && $result->num_rows > 0) {
								        $row = $result->fetch_assoc(); // Fetch the row
								        $userImage = $row['image'];
								
								        echo "
								        <img src='/img/avatars/$userImage' class='avatar img-fluid rounded me-1' alt='$username' />
								        <span class='text-dark'>$username</span>";
								    } else {
								        echo "User image not found.";
								    }
								} echo"
							

							</a>
							<div class='dropdown-menu dropdown-menu-end'>
								<a class='dropdown-item' href='/pages/profile.php'><i class='align-middle me-1' data-feather='user'></i> Profile</a>
								<a class='dropdown-item' href='/analytics.php'><i class='align-middle me-1' data-feather='pie-chart'></i> Analytics</a>
								<div class='dropdown-divider'></div>
								<a class='dropdown-item' href='/index.html'><i class='align-middle me-1' data-icon='settings'></i> Settings & Privacy</a>
								<a class='dropdown-item' href='/help.php'><i class='align-middle me-1' data-feather='help-circle'></i> Help Center</a>
								<div class='dropdown-divider'></div>
								<a class='dropdown-item' onclick='' id='logoutLink'>Uitloggen</a>
								<script>
								document.addEventListener('DOMContentLoaded', function () {
								    const logoutLink = document.getElementById('logoutLink');
								    const logoutResponse = document.getElementById('logoutResponse');
								
								    logoutLink.addEventListener('click', function (e) {
								        e.preventDefault(); // Prevent default link behavior
								
								        // Perform AJAX request
								        const xhr = new XMLHttpRequest();
								        xhr.open('GET', '/functions/logout.php', true);
								        xhr.onreadystatechange = function () {
								            if (xhr.readyState === 4 && xhr.status === 200) {
								                const response = JSON.parse(xhr.responseText);
								                if (response.status === 'success') {
								                    // Handle successful logout
								                    logoutResponse.textContent = 'Uitgelogd!';
								                    // Add additional logic here to update the page as needed.
								                } else {
								                    // Handle other response statuses
								                    logoutResponse.textContent = 'Er is iets fout gegaan.';
								                }
								            }
								        };
								        xhr.send();
								    });
								});
								</script>
								<div id='logoutResponse'></div>
							</div>
						</li>
					</ul>
				</div>
			</nav>";
	
	