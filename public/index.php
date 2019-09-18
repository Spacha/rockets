<?php

	define('ROOT_PATH', dirname(__DIR__));

	require_once(ROOT_PATH . '/vendor/autoload.php');

?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Miika Sikala">
		<link rel="icon" type="image/jpeg" href="/favicon.jpg" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

		<!-- Styles -->
		<link rel="stylesheet" href="<?=assetVersion('/css/app.css');?>">

		<title>Rockets</title>

		<!-- TODO: use webpack! -->
		<script src="/js/plotly.min.js"></script>
	</head>
	<body>

		<!-- Top Nav -->
		<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow justify-content-center">
			<a class="navbar-brand col-md-2 mr-0" href="#">Rockets</a>
		</nav>

		<div class="container">

			<section class="mt-5">
				<h2>1. Classification</h2>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

			</section>

			<section class="mt-5">
				<h2>2. Definitions and Fundamentals</h2>
					
					<section class="concept">
						<div class="img-graph" id="myDiv"></div>

						<p><b>Total impulse <i>I<sub>t</sub></i></b> (Ns) is the <i>thrust</i> over time, from time <span class="text-nowrap">t = 0 to t</span>.</p>
						<p class="pl-5 ktx-eq--eq2_1"></p>

						<p>For constant thrust and negligibly small start and stop transients, total impulse becomes <span class="ktx-eq--eq2_2"></span>.</p>

						<div id="vue-experiment--specific-impulse" class="clearfix-before">
							<div class="text-center pt-4">
								<b-button class="mb-4" variant="info" v-b-modal.modal-1>Experiment with <b>I<sub>t</sub></b></b-button>
							</div>

							<b-modal id="modal-1" title="Total Impulse" size="lg">
								<template v-slot:modal-footer>
									<div class="w-100">
										<b-button
											variant="primary"
											size="sm"
											class="float-right"
											@click="$bvModal.hide('modal-1')"
										>
											Close
										</b-button>
									</div>
								</template>
								<total-impulse />
							</b-modal>
						</div>
					</section>

					<section class="concept">
						<p><b>Specific impulse <i>I<sub>s</sub></i></b> tells how much thrust is created per weight unit of propellant (mass multiplied by standard gravity). It tells about certain rocket's or rocket engine's performance in general: "How much do I get thrust from one kg (specifically kg-weight) of propellant?". Hence, larger specific impulse is obviously better. It's similar measure of performance as cars' fuel consumption per 100km.</p>
						<p class="pl-5 ktx-eq--eq2_3_4"></p>
						
						<p>If thrust and mass flow rate are nearly constant during the whole operation, the equation can be simplified as following:</p>
						<p class="pl-5 ktx-eq--eq2_5"></p>

						<div class="mt-4 mb-3">
							<!-- TODO: vue component <unit-derivation concept="total-impulse" /> -->
							<!-- TODO: also remove bottom border and flip the chevron on open /> -->
							<div class="toggle-unit-derivation">
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#unit-derivation--specific-impulse">
									Unit derivation [<b>s</b>]
									<i class="ml-2 fa fa-chevron-down"></i>
								</button>
								
							</div>

							<div class="collapse" id="unit-derivation--specific-impulse">
								<div class="card card-body">
									<p>Remember that newton is defined as mass times acceleration or <span class="ktx-eq--newton"></span>.</p>
									<p class="pl-5 mb-0 ktx-eq--unitI_t"></p>
								</div>
							</div>
						</div>

					</section>

					<section class="concept">
						<p><b>Effective exhaust velocity <i>c</i></b> (m/s<sup>2</sup>) is similar measure of performance as specific impulse. It tells how fast the exhaust gas would be flowing out of the nozzle if it was coming out perfectly <i>perpendicularly through the nozzle exit plane.</i> Of course in reality this is never the case, but this gives a good way to measure engine's performance since it tells how much kinetic energy the engine is able to give for it's exhaust gas. It relates closely to specific impulse.</p>
						<p>Effective exhaust velocity can also be calculated by dividing total thrust by total mass of propellant expelled.</p>
						<p class="pl-5 ktx-eq--eq2_6"></p>
					</section>

					<section class="concept">
						<p>Mass ratio</p>
						<p class="pl-5 ktx-eq--eq2_7"></p>

						<p>Propellant mass fraction tells something fun! It's represented by lower case <i>zeta ( &zeta; )</i>.</p>
						<p class="pl-5 ktx-eq--eq2_8_9_10"></p>

						<p>There's also a fun concept called <i>impulse-to-weight</i> ratio</p>
						<p class="pl-5 ktx-eq--eq2_11_12"></p>
						<p class="pl-5 ktx-eq--eq2_13"></p>
					</section>

			</section>


			<footer class="text-center mt-5 mb-3 text-muted">
				by Miika Sikala
			</footer>
			
		</div>


		<!-- Scripts that load after DOM -->
		<script src="/js/app.js"></script>
	</body>
</html>
