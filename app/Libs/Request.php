<?php

namespace Spacha\Rockets\Libs;

/**
 * Works as a request interface. This class knows
 * the current url, payload and those things.
 *
 * @author Miika Sikala <miikasikala96@gmail.com>
 */
class Request
{
	/**
	 * Get current url – meaning everything after hostname.
	 *
	 * @return string
	 */
	public static function url() : string
	{
		$rawUri = $_SERVER['REQUEST_URI'];
		$url = trim(parse_url($rawUri, PHP_URL_PATH), '/');
		
		return strlen($url) ? $url : '/';
	}
}
