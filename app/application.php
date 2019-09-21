<?php

namespace Spacha\Rockets;

use Spacha\Rockets\Libs\Request;
use Spacha\Rockets\Libs\Router;

/**
 * Main class of the application. Pulls all the strings.
 * 
 * @author Miika Sikala <miikasikala96@gmail.com>
 */
class Application
{
	protected $rootPath;
	protected $appPath;

	/**
	 * Prepares the application before running.
	 *
	 * @param string $rootPath
	 * @param void
	 */
	public function __construct(string $rootPath)
	{
		$this->rootPath = $rootPath;
		$this->appPath = $rootPath . '/app';
	}

	/**
	 * Runs the application. Gets the current request and does things based
	 * on it.
	 *
	 * @return void
	 */
	public function run()
	{
		$url = Request::url();

		$router = new Router();
		$router->route($url);
	}
}
