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
					
					<section class="concept clearfix">
						<div style="width: 40%;" class="float-right" id="myDiv"></div>

						<p><b>Total impulse</b> is the <i>thrust</i> over time, from time t = 0 to t.</p>
						<p class="pl-5" id="ktx-eq--eq2_1"></p>

						<p>For constant thrust and negligibly small start and stop transients, total impulse becomes <span id="ktx-eq--eq2_2"></span>.</p>
					</section>

					<section class="concept">
						<p><b>Specific impulse</b> tells how much thrust is created per weigh unit of propellant (mass multiplied by standard gravity).</p>
						<p class="pl-5" id="ktx-eq--eq2_3"></p>
					</section>

			</section>
			
		</div>


		<!-- Scripts that load after DOM -->
		<script src="/js/app.js"></script>
	</body>
</html>
