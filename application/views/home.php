<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '\views\header_user.php');
?>

<main>
	<!-- Whats New Start -->
	<section class="whats-news-area pt-50 pb-20 gray-bg">
		<h1 class="text-center">Aplikasi Mengkoordinir</h1>
		<h2 class="text-center">Data-data Digital</h2>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="whats-news-wrapper">
						<div class="col-12">
							<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="<?= base_url('assets/carousel/3.jpg') ?>" alt="First slide">
										<div class="carousel-caption d-none d-md-block">
										</div>
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="<?= base_url('assets/carousel/5.jpg') ?>" alt="Second slide">
										<div class="carousel-caption d-none d-md-block">
										</div>
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Whats New End -->
</main>

<?php
require_once(__ROOT__ . '\views\footer_user.php');
?>