<?php
	
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/ini.inc");
	session_start();
	
	if (!isset($_SESSION['loggedin'])) {
		header("Location: /pages/login.php");
		exit;
	}

	
	$title = 'Webcrafters Admin dashboard';
	$keywords = "Webcrafters, admin, dashboard";
	$description = "Webcrafters admin dashboard";
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/header.php");
	require ("{$_SERVER["DOCUMENT_ROOT"]}/functions/getPageviewsForPeriod.php");
	$dev1 = "Matthias Gielen";
	$dev2 = "Frank Grijze";
	$blogger1 = "Selina DiGiuseppe";
	
		
		echo "
			<main class='content'>
				<div class='container-fluid p-0'>

					<h1 class='h3 mb-3'><strong>Statistieken</strong> Dashboard</h1>

					<div class='row'>
						<div class='col-xl-6 col-xxl-5 d-flex'>
							<div class='w-100'>
								<div class='row'>
									<div class='col-sm-6'>
										<!-- ALLE pageviews -->
										<div class='card'>
											<div class='card-body'>
												<div class='row'>
													<div class='col mt-0'>
														<h5 class='card-title'>Paginabezoeken</h5>
													</div>
													<div class='col-auto'>
														<div class='stat text-primary'>
															<i class='align-middle' data-feather='truck'></i>
														</div>
													</div>
												</div>
												<h1 class='mt-1 mb-3'>" . $pageviewsData['all'] . "</h1>
												<div class='mb-0'>
													<span class='text-success'> <i class='mdi mdi-arrow-bottom-right'></i>" . calculatePercentageChange($pageviewsData['last_year'], $pageviewsData['this_year']) . "% </span>
													<span class='text-muted'>T.o.v. vorig jaar</span>
												</div>
											</div>
										</div>
										
										<!-- Pageviews vorige week -->
										<div class='card'>
											<div class='card-body'>
												<div class='row'>
													<div class='col mt-0'>
														<h5 class='card-title'>Vorige week</h5>
													</div>

													<div class='col-auto'>
														<div class='stat text-primary'>
															<i class='align-middle' data-feather='users'></i>
														</div>
													</div>
												</div>
												<h1 class='mt-1 mb-3'> " . $pageviewsData['last_week'] . "</h1>
												<div class='mb-0'>
													<span class='text-warning'> <i class='mdi mdi-arrow-bottom-right'></i>" . calculatePercentageChange($pageviewsData['current_week'], $pageviewsData['last_week']) . "% </span>
													<span class='text-muted'>T.o.v. huidige week</span>
												</div>
											</div>
										</div>
									</div>
									
									<div class='col-sm-6'>
										<!-- Pageviews deze week -->
										<div class='card'>
											<div class='card-body'>
												<div class='row'>
													<div class='col mt-0'>
														<h5 class='card-title'>Deze week</h5>
													</div>

													<div class='col-auto'>
														<div class='stat text-primary'>
															<i class='align-middle' data-feather='check'></i>
														</div>
													</div>
												</div>
												<h1 class='mt-1 mb-3'>" . $pageviewsData['current_week'] . "</h1>
												<div class='mb-0'>
													<span class='text-success'> <i class='mdi mdi-arrow-bottom-right'></i>" . calculatePercentageChange($pageviewsData['last_week'], $pageviewsData['current_week']) . "% </span>
													<span class='text-muted'>T.o.v. vorige week</span>
												</div>
											</div>
										</div>
										<div class='card'>
											<div class='card-body'>
												<div class='row'>
													<div class='col mt-0'>
														<h5 class='card-title'>Deze maand</h5>
													</div>

													<div class='col-auto'>
														<div class='stat text-primary'>
															<i class='align-middle' data-feather='shopping-cart'></i>
														</div>
													</div>
												</div>
												<h1 class='mt-1 mb-3'>" . $pageviewsData['this_month'] . "</h1>
												<div class='mb-0'>
													<span class='text-success'> <i class='mdi mdi-arrow-bottom-right'></i>" . calculatePercentageChange($pageviewsData['last_month'], $pageviewsData['this_month']) . "%</span>
													<span class='text-muted'>Sinds vorige maand</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class='col-xl-6 col-xxl-7'>
							<div class='card flex-fill w-100'>
								<div class='card-header'>

									<h5 class='card-title mb-0'>Pageviews in kaart</h5>
								</div>
								<div class='card-body py-3'>
									<div class='chart chart-sm'>
										<canvas id='chartjs-dashboard-line'></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class='row'>
						<div class='col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3'>
							<div class='card flex-fill w-100'>
								<div class='card-header'>

									<h5 class='card-title mb-0'>Browser gebruik</h5>
								</div>
								<div class='card-body d-flex'>
									<div class='align-self-center w-100'>
										<div class='py-3'>
											<div class='chart chart-xs'>
												<canvas id='chartjs-dashboard-pie'></canvas>
											</div>
										</div>

										<table id='browserTable' class='table mb-0'>
											<tbody>
											
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class='col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2'>
							<div class='card flex-fill w-100'>
								<div class='card-header'>

									<h5 class='card-title mb-0'>Real-Time</h5>
								</div>
								<div class='card-body px-4'>
									<div id='world_map' style='height:350px;'></div>
								</div>
							</div>
						</div>
						<div class='col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1'>
						    <div class='card flex-fill'>
						        <div class='card-header'>
						            <h5 class='card-title mb-0'>Kalender</h5>
						        </div>
						        <div class='card-body d-flex'>
						            <div class='align-self-center w-100'>
						                <div class='chart'>
						                    <div id='datetimepicker-dashboard'></div>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
					</div>

					<div class='row'>
						<div class='col-12 col-lg-8 col-xxl-9 d-flex'>
							<div class='card flex-fill'>
								<div class='card-header'>

									<h5 class='card-title mb-0'>Lopende projecten</h5>
								</div>
								<table class='table table-hover my-0'>
									<thead>
										<tr>
											<th>Naam</th>
											<th class='d-none d-xl-table-cell'>Start Datum</th>
											<th class='d-none d-xl-table-cell'>Eind Datum</th>
											<th>Status</th>
											<th class='d-none d-md-table-cell'>Toegewezen</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Webcrafters</td>
											<td class='d-none d-xl-table-cell'>01/08/2023</td>
											<td class='d-none d-xl-table-cell'>31/12/2023</td>
											<td><span class='badge bg-success'>Lopend</span></td>
											<td class='d-none d-md-table-cell'>Matthias Gielen</td>
										</tr>
										<tr>
											<td>Project Digidesign</td>
											<td class='d-none d-xl-table-cell'>01/02/2023</td>
											<td class='d-none d-xl-table-cell'>31/06/2023</td>
											<td><span class='badge bg-danger'>Lopend</span></td>
											<td class='d-none d-md-table-cell'>Matthias Gielen</td>
										</tr>
										<tr>
											<td>Project A-plant</td>
											<td class='d-none d-xl-table-cell'>06/08/2023</td>
											<td class='d-none d-xl-table-cell'>11/09/2023</td>
											<td><span class='badge bg-warning'>Wachten registratie</span></td>
											<td class='d-none d-md-table-cell'>$dev2</td>
										</tr>
										<tr>
											<td>Project Plantenbieb</td>
											<td class='d-none d-xl-table-cell'>12/04/2023</td>
											<td class='d-none d-xl-table-cell'>30/06/2023</td>
											<td><span class='badge bg-warning'>On hold</span></td>
											<td class='d-none d-md-table-cell'>Matthias Gielen</td>
										</tr>
										<tr>
											<td>Project Million-spots</td>
											<td class='d-none d-xl-table-cell'>01/01/2023</td>
											<td class='d-none d-xl-table-cell'>31/06/2023</td>
											<td><span class='badge bg-danger'>Klant gestopt</span></td>
											<td class='d-none d-md-table-cell'>$dev1</td>
										</tr>
										<tr>
											<td>Project dashboard</td>
											<td class='d-none d-xl-table-cell'>01/01/2023</td>
											<td class='d-none d-xl-table-cell'>31/06/2023</td>
											<td><span class='badge bg-success'>Lopend</span></td>
											<td class='d-none d-md-table-cell'>$dev1</td>
										</tr>
										<tr>
											<td>Project Templates</td>
											<td class='d-none d-xl-table-cell'>01/01/2023</td>
											<td class='d-none d-xl-table-cell'>31/06/2023</td>
											<td><span class='badge bg-success'>Lopend</span></td>
											<td class='d-none d-md-table-cell'>$dev1</td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class='col-12 col-lg-4 col-xxl-3 d-flex'>
							<div class='card flex-fill w-100'>
								<div class='card-header'>

									<h5 class='card-title mb-0'>Maandelijkse verkopen</h5>
								</div>
								<div class='card-body d-flex w-100'>
									<div class='align-self-center chart chart-lg'>
										<canvas id='chartjs-dashboard-bar'></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
";
	
	
	
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/footer.php");

	