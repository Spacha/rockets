<?php

define('ROOT_PATH', dirname(__DIR__));

// Get set...
require_once(ROOT_PATH . '/vendor/autoload.php');

use Spacha\Rockets\Application;

// Readyyy...
$app = new Application(ROOT_PATH);

// ...go!
$app->run();
