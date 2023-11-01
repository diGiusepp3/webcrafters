<?php
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/header.php");
    echo"	
	
	<main class='content'>
				<div class='container-fluid p-0'>

					<div class='mb-3'>
						<h1 class='h3 d-inline align-middle'>Chart.js</h1>
						
					</div>
					<div class='row'>
						<div class='col-12 col-lg-6'>
							<div class='card flex-fill w-100'>
								<div class='card-header'>
									<h5 class='card-title'>Line Chart</h5>
									<h6 class='card-subtitle text-muted'>De line chart toont de verkoopcijfers in euro's voor elke maand. De gegevens worden weergegeven op de verticale as, en de maanden worden weergegeven op de horizontale as.</h6>
								</div>
								<div class='card-body'>
									<div class='chart'>
										<canvas id='chartjs-line'></canvas>
									</div>
								</div>
							</div>
						</div>
						
						<div class='col-12 col-lg-6'>
							<div class='card flex-fill w-100'>
								<div class='card-header'>
									<h5 class='card-title'>Dashboard line chart</h5>
									<h6 class='card-subtitle text-muted'>In een line chart worden gegevenspunten met elkaar verbonden door middel van rechte lijnen, waarbij de horizontale as de tijdsperiode of categorieën vertegenwoordigt en de verticale as de numerieke waarden van de gegevens aangeeft.</h6>
								</div>
								<div class='card-body'>
									<div class='chart'>
										<canvas id='chartjs-dashboard-line'></canvas>
									</div>
								</div>
							</div>
						</div>
						
						<div class='col-12 col-lg-6'>
							<div class='card flex-fill w-100'>
								<div class='card-header'>
									<h5 class='card-title'>Dashboard pie chart</h5>
									<h6 class='card-subtitle text-muted'>Een pie chart bestaat uit een cirkel (de \"taart\") die is verdeeld in verschillende sectoren, elk vertegenwoordigt een categorie.</h6>
								</div>
								<div class='card-body'>
									<div class='chart'>
										<canvas id='chartjs-dashboard-pie'></canvas>
									</div>
								</div>
							</div>
						</div>
						
						<div class='col-12 col-lg-6'>
							<div class='card'>
								<div class='card-header'>
									<h5 class='card-title'>Bar Chart</h5>
									<h6 class='card-subtitle text-muted'>Een staafgrafiek biedt een manier om gegevenswaarden weer te geven als verticale balken.</h6>
								</div>
								<div class='card-body'>
									<div class='chart'>
										<canvas id='chartjs-dashboard-bar'></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class='col-12 col-lg-6'>
							<div class='card'>
								<div class='card-header'>
									<h5 class='card-title'>Doughnut Chart</h5>
									<h6 class='card-subtitle text-muted'>Donutgrafieken zijn uitstekend geschikt om de onderlinge verhoudingen tussen gegevens weer te geven.</h6>
								</div>
								<div class='card-body'>
									<div class='chart chart-sm'>
										<canvas id='chartjs-doughnut'></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class='col-12 col-lg-6'>
							<div class='card'>
								<div class='card-header'>
									<h5 class='card-title'>Pie Chart</h5>
									<h6 class='card-subtitle text-muted'>Taart grafieken zijn handig om de verdeling over verschillende categorieën weer te geven</h6>
								</div>
								<div class='card-body'>
									<div class='chart chart-sm'>
										<canvas id='chartjs-pie'></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>";
	
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/footer.php");

   