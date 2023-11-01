<?php
	
	
	
	$title = 'Webcrafters Admin';
	$keywords = "Webcrafters, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web";
	$description = "Webcrafters admin template";
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/header.php");
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/ini.inc");
	
	
	
        echo"
			<main class='content'>
				<div class='container-fluid p-0'>
				
					<div class='row'>
						<div class='col-md-4 col-xl-3'>
							<div class='card mb-3'>
								<div class='card-header'>
									<h5 class='card-title mb-0'>Profiel details</h5>
								</div>
								<div class='card-body text-center'>
									<img src='/img/avatars/team-1.webp' alt='Matthias Gielen' class='img-fluid rounded-circle mb-2' width='128' height='128' />
									<h5 class='card-title mb-0'>Matthias Gielen</h5>
									<div class='text-muted mb-2'>Lead Developer</div>

									<div>
										<a class='btn btn-primary btn-sm' href='#'>Volg</a>
										<a class='btn btn-primary btn-sm' href='#'><span data-feather='message-square'></span> Bericht</a>
									</div>
								</div>
								<hr class='my-0' />
								<div class='card-body'>
									<h5 class='h6 card-title'>Skills</h5>
									<a href='#' class='badge bg-primary me-1 my-1'>HTML</a>
									<a href='#' class='badge bg-primary me-1 my-1'>JavaScript</a>
									<a href='#' class='badge bg-primary me-1 my-1'>Sass</a>
									<a href='#' class='badge bg-primary me-1 my-1'>jQuery</a>
									<a href='#' class='badge bg-primary me-1 my-1'>AJAX</a>
									<a href='#' class='badge bg-primary me-1 my-1'>jSon</a>
									<a href='#' class='badge bg-primary me-1 my-1'>PHP</a>
								</div>
								<hr class='my-0' />
								<div class='card-body'>
									<h5 class='h6 card-title'>Over</h5>
									<ul class='list-unstyled mb-0'>
										<li class='mb-1'><span data-feather='home' class='feather-sm me-1'></span> Woont in <a href='https://goo.gl/maps/KLDkEBDwioY389EK8'>Bocholt, BE</a></li>

										<li class='mb-1'><span data-feather='briefcase' class='feather-sm me-1'></span> Werkt bij<a href='https://www.digidesign.be'> Digidesign</a></li>
										<li class='mb-1'><span data-feather='map-pin' class='feather-sm me-1'></span> Van <a href='#'>Hamont</a></li>
									</ul>
								</div>
								<hr class='my-0' />
								<div class='card-body'>
									<h5 class='h6 card-title'>Elsewhere</h5>
									<ul class='list-unstyled mb-0'>
										<li class='mb-1'><a href='https://www.digidesign.be'>Digidesign.be</a></li>
										<li class='mb-1'><a href='https://twitter.com/DigiDes80273641'>Twitter</a></li>
										<li class='mb-1'><a href='https://www.facebook.com/digidesignDEV'>Facebook</a></li>
										<li class='mb-1'><a href='https://www.instagram.com/digidesign.be'>Instagram</a></li>
										<li class='mb-1'><a href='https://www.linkedin.com/company/web-digidesign'>LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class='col-md-8 col-xl-9'>
							<div class='card'>
								<div class='card-header'>

									<h5 class='card-title mb-0'>Activiteit</h5>
								</div>
								<div class='card-body h-100'>

									<div class='d-flex align-items-start'>
										<img src='../img/avatars/avatar-5.jpg' width='36' height='36' class='rounded-circle me-2' alt='Vanessa Tucker'>
										<div class='flex-grow-1'>
											<small class='float-end text-navy'>5m ago</small>
											<strong>Selina Di Giuseppe</strong> volgt <strong>Matthias Gielen</strong><br />
											<small class='text-muted'>Sinds: Vandaag 8:51</small><br />

										</div>
									</div>
 
									<hr />
									<div class='d-flex align-items-start'>
										<img src='../img/avatars/avatar.jpg' width='36' height='36' class='rounded-circle me-2' alt='Charles Hall'>
										<div class='flex-grow-1'>
											<small class='float-end text-navy'>30m ago</small>
											<strong>Selina Di Giuseppe</strong> heeft iets op <strong>Matthias Gielen</strong>'s tijdslijn geplaatst<br />
											<small class='text-muted'>Vandaag 8:21 pm</small>

											<div class='border text-sm text-muted p-2 mt-1'>
												
											</div>

											<a href='#' class='btn btn-sm btn-danger mt-1'><i class='feather-sm' data-feather='heart'></i> Like</a>
										</div>
									</div>

									<hr />
									<div class='d-flex align-items-start'>
										<img src='../img/avatars/avatar-4.jpg' width='36' height='36' class='rounded-circle me-2' alt='Matthias Gielen'>
										<div class='flex-grow-1'>
											<small class='float-end text-navy'>1h ago</small>
											<strong>Matthias Gielen</strong> posted a new blog<br />

											<small class='text-muted'>Today 6:35 pm</small>
										</div>
									</div>

									<hr />
									<div class='d-flex align-items-start'>
										<img src='../img/avatars/avatar-2.jpg' width='36' height='36' class='rounded-circle me-2' alt='William Harris'>
										<div class='flex-grow-1'>
											<small class='float-end text-navy'>3h ago</small>
											<strong>William Harris</strong> posted two photos on <strong>Matthias Gielen</strong>'s timeline<br />
											<small class='text-muted'>Today 5:12 pm</small>

											<div class='row g-0 mt-1'>
												<div class='col-6 col-md-4 col-lg-4 col-xl-3'>
													<img src='../img/photos/unsplash-1.jpg' class='img-fluid pe-2' alt='Unsplash'>
												</div>
												<div class='col-6 col-md-4 col-lg-4 col-xl-3'>
													<img src='../img/photos/unsplash-2.jpg' class='img-fluid pe-2' alt='Unsplash'>
												</div>
											</div>

											<a href='#' class='btn btn-sm btn-danger mt-1'><i class='feather-sm' data-feather='heart'></i> Like</a>
										</div>
									</div>

									<hr />
									<div class='d-flex align-items-start'>
										<img src='../img/avatars/avatar-2.jpg' width='36' height='36' class='rounded-circle me-2' alt='William Harris'>
										<div class='flex-grow-1'>
											<small class='float-end text-navy'>1d ago</small>
											<strong>William Harris</strong> started following <strong>Matthias Gielen</strong><br />
											<small class='text-muted'>Yesterday 3:12 pm</small>

											<div class='d-flex align-items-start mt-1'>
												<a class='pe-3' href='#'>
                <img src='../img/avatars/avatar-4.jpg' width='36' height='36' class='rounded-circle me-2' alt='Matthias Gielen'>
              </a>
												<div class='flex-grow-1'>
													<div class='border text-sm text-muted p-2 mt-1'>
														Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.
													</div>
												</div>
											</div>
										</div>
									</div>

									<hr />
									<div class='d-flex align-items-start'>
										<img src='../img/avatars/avatar-4.jpg' width='36' height='36' class='rounded-circle me-2' alt='Matthias Gielen'>
										<div class='flex-grow-1'>
											<small class='float-end text-navy'>1d ago</small>
											<strong>Matthias Gielen</strong> posted a new blog<br />
											<small class='text-muted'>Yesterday 2:43 pm</small>
										</div>
									</div>

									<hr />
									<div class='d-flex align-items-start'>
										<img src='../img/avatars/avatar.jpg' width='36' height='36' class='rounded-circle me-2' alt='Charles Hall'>
										<div class='flex-grow-1'>
											<small class='float-end text-navy'>1d ago</small>
											<strong>Charles Hall</strong> started following <strong>Matthias Gielen</strong><br />
											<small class='text-muted'>Yesterdag 1:51 pm</small>
										</div>
									</div>

									<hr />
									<div class='d-grid'>
										<a href='#' class='btn btn-primary'>Load more</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
";
	
	require_once("{$_SERVER["DOCUMENT_ROOT"]}/footer.php");
	