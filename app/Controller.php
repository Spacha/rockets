<?php

namespace Spacha\Rockets;

use Spacha\Rockets\Layouts\App as Layout;

class Controller
{
	public function index()
	{
		header('Location: /concepts');
		die();
	}

	public function concepts()
	{
		return new Layout('concepts/concepts');
	}

	public function conceptsEquations()
	{
		return new Layout('concepts/equations');
	}

	public function rockets()
	{
		return new Layout('rockets');
	}

	public function relatedTheory()
	{
		return new Layout('related-theory');
	}

	public function links()
	{
		return new Layout('links');
	}

	public function notes()
	{
		return new Layout('notes');
	}
}
