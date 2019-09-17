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
	</head>
	<body>

		<!-- Top Nav -->
		<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Rockets</a>
		</nav>

		<div class="container-fluid">

			<h1>Moikkelis hoikkelis.</h1>
			
		</div>


		<!-- Scripts that load after DOM -->
		<script src="/js/app.js"></script>
	</body>
</html>
