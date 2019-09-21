<?php

namespace Spacha\Rockets\Libs;

use Spacha\Rockets\Controller;

/**
 * Takes are of matching the current route to a controller.
 * 
 * @author Miika Sikala <miikasikala96@gmail.com>
 */
class Router
{
	protected $controller;

	public function __construct()
	{
		$this->controller = new Controller();
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
				$this->controller->index();
				break;

			case 'concepts':
				$this->controller->concepts();
				break;

			case 'concepts/equations':
				$this->controller->conceptsEquations();
				break;		

			case 'rockets':
				$this->controller->rockets();
				break;

			case 'related-theory':
				$this->controller->relatedTheory();
				break;

			case 'links':
				$this->controller->links();
				break;

			case 'notes':
				$this->controller->notes();
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
}
