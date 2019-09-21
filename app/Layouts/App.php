<?php

namespace Spacha\Rockets\Layouts;

use Spacha\Rockets\Libs\View;

class App
{
	protected $layoutFile = 'app';
	protected $viewsDir;
	protected $customVars = [];

	public function __construct(string $template, array $customVars = [])
	{
		$this->viewsDir = ROOT_PATH . '/app/views';
		
		$this->render($template);
	}

	/**
	  * Renders given html template to the browser and stops the application.
	  *
	  * @param string $template
	  * @return string
	  */
	protected function render(string $template)
	{
		// be careful: these must be in order so variables would work!
		// layout needs all the other variables so it must be last
		$files = [
			'content' => $this->viewsDir .'/'. $template . '.phtml',
			'layout' => $this->viewsDir .'/_layouts/'. $this->layoutFile . '.phtml',
		];

		$contents = [];
		
		// these are available in the view among with '$contents'
		$vars = [
			'active-link' => $template
		] + $this->customVars;

		// Start getting pieces...
		ob_start();

		foreach ($files as $type => $filePath) {
			// template file not found, no can do...
			if (!file_exists($filePath)) {
				die("Error! Template or layout '{$filePath}' not found!");
			}
		
			require $filePath;

			$contents[$type] = ob_get_clean();
		}


		// let's just die...
		die($contents['layout']);
	}
}
