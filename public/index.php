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
		<header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow justify-content-center">
			<a class="navbar-brand col-md-2 mr-0" href="#">Rockets</a>
		</header>
		
		<div class="nav-scroller py-1 mb-2">
			<nav class="nav d-flex justify-content-center">
				<a class="p-2 text-muted link-active" href="/concepts">Concepts</a>
				<a class="p-2 text-muted" href="/rockets">Rockets</a>
				<a class="p-2 text-muted" href="/related-theory">Related Theory</a>
				<a class="p-2 text-muted" href="/links">Links</a>
			</nav>
		</div>

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

					<h3>2.1 Definitions</h3>
					
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
						<p><b>Specific impulse <i>I<sub>s</sub></i></b> (s) tells how much thrust is created per weight unit of propellant (mass multiplied by standard gravity). It tells about certain rocket's or rocket engine's performance in general: "How much do I get thrust from one kg (specifically kg-weight) of propellant?". Hence, larger specific impulse is obviously better. It's similar measure of performance as cars' fuel consumption per 100km.</p>
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
						<p><b>Mass ratio MR</b> is the ratio of vehicle's initial and final mass (after operation). Mass ratio can be applied not only to a vehicle, but also to a particular stage or even to a propulsion system itself.</p>
						<p class="pl-5 ktx-eq--eq2_7"></p>
						
						where
						<ul>
							<li><i>m<sub>f</sub></i> = Final mass of the target. Consists of vehicle's inert mass, residual propellant etc.</li>
							<li><i>m<sub>0</sub></i> = Initial mass of the target. Consists of vehicle's inert mass, loaded propellant tanks etc.</li>
						</ul>
					</section>
					<section class="concept">
						<p><b>Propellant mass fraction <i>&zeta;</i></b> (lower case <i>zeta</i>) tells how big portion of the vehicle's mass consists of propellant.</p>

						<p>Low <i>&zeta;</i> &rarr; very little propellant compared to the vehicle's inert mass (e.g. in cars, where fuel tank is very small).</p>
						<p>High <i>&zeta;</i> &rarr; very large percentage of the rocket consists of propellant.</p>
						<p class="pl-5 ktx-eq--eq2_8_9_10"></p>
						<i>Todo: derivation of the above equations.</i>
					</section>

					<section class="concept">
						<p><b>Impulse-to-weight ratio <i>I<sub>t</sub>/w<sub>0</sub></i></b> tells how much of an impulse we get in relation to the rocket's initial mass. If we have a light rocket that has a powerful engine (big <i>I<sub>t</sub></i> or lots of kinetic energy transmitted to/from the vehicle and small <i>m<sub>0</sub></i>), we get bigger value &rarr; indication of efficient, good design.</p>
						<p class="pl-5 ktx-eq--eq2_11"></p>
						<i>Todo: derivation of the above equations.</i>
					</section>

					<h3>2.2 Thrust</h3>

					<section class="concept">
						<p>Thrust tells how fast the vehicle/engine is able to change momentum (add/remove kinetic energy).</p>
						<p class="pl-5 ktx-eq--eq2_12"></p>
						<p>As we see from the equation, thrust tells how much vehicle's velocity changed over time t (taking vehicle's mass into account). Other way around, the heavier the vehicle, the more thrust it requires to change the velocity, let's say, 1m/s.</p>
						<p>When we are at sea level, we usually assume that the pressure ratio (see later) is zero so that the pressure at nozzle exit equals the environment pressure. This means that all the propellant mass that goes in the engine through the injector, comes out of the other side with higher velocity. This velocity is <i>v<sub>2</sub></i> and the amount of mass injected into the engine (and ejected out of the nozzle) is <i>&#7745;</i>.</p>
						<p>This equation applies only when the nozzle exit pressure matches outside pressure, so we'll need to extend this a little bit by adding pressure force to the equation.</p>

						<p>Thrust in chemical rockets consists of two parts: <i>momentum thrust</i> and <i>pressure thrust</i>. Momentum thrust is based on newton's second and third law: if we accelerate mass to one way, we get an equally large force to opposite way. In rocket's, we accelerate light molecules through nozzle, which applies an opposing force to our nozzle which, in turn, conveys the force to the engine and the rocket body. The second part of the thrust is pressure thrust, which is usually tiny compared to momentum thrust.</p>
						<p>As we see from the equation below, when nozzle exit pressure is smaller than outside pressure, the pressure part is negative, lowering our specific impulse. Therefore it's desirable to have the nozzle exit pressure equal or higher than the outside pressure.</p>
						
						<p class="pl-5 ktx-eq--eq2_13"></p>

						where
						<ul>
							<li><i>p<sub>2</sub></i> = Pressure ar the nozzle exit plane.</li>
							<li><i>p<sub>3</sub></i> = Outside pressure.</li>
							<li><i>A<sub>2</sub></i> = Nozzle exit area.</li>
						</ul>
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
