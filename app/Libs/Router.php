<?php

namespace Spacha\Rockets\Libs;

/**
 * Takes are of matching the current route to a controller.
 * 
 * @author Miika Sikala <miikasikala96@gmail.com>
 */
class Router
{
	protected $viewsDir;

	public function __construct()
	{
		$this->viewsDir = ROOT_PATH . '/app/views';
	}

	/**
	 * This method checks if given url mathces any of the defined routes.
	 * If it does, the page is returned. Otherwise error page is shown.
	 *
	 * @param string $url
	 * @return void
	 */
	public function route(string $url)
	{
		// Routing Table
		switch ($url) {
			case '/':
				$this->renderView('home.phtml');
				break;

			case 'concepts':
				$this->renderView('concepts/concepts.phtml');
				break;

			case 'concepts/equations':
				$this->renderView('concepts/equations.phtml');
				break;		

			case 'rockets':
				$this->renderView('rockets.phtml');
				break;

			case 'related-theory':
				$this->renderView('related-theory.phtml');
				break;

			case 'links':
				$this->renderView('links.phtml');
				break;

			case 'notes':
				$this->renderView('notes.phtml');
				break;	

			default:
				$this->pageNotFound();
				break;
		}
	}

	/**
	 * This method should be called when the route doesn't match any of the
	 * given routes.
	 * @todo Render
	 *
	 * @return void
	 */
	public function pageNotFound()
	{
		$this->renderView('_errors/404.phtml');
	}

	/**
	  * Renders given html template to the browser and stops the application.
	  *
	  * @param string $view
	  * @return string
	  */
	protected function renderView(string $view)
	{
		$fullPath = $this->viewsDir .'/'. $view;

		// template file not found, no can do...
		if (!file_exists($fullPath)) {
			die("Error! Template {$fullPath} not found!");
		}

		// let's just die...
		die(require($fullPath));
	}
}
