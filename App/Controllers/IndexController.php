<?php
namespace App\Controllers;

use PSharp\Http\Route;
use PSharp\Http\NotFound;
use PSharp\Http\Actions\ControllerBase;
use PSharp\Http\Methods\{HttpGet, HttpPost};

#[ApiController]
#[Route('/')]
class IndexController extends ControllerBase
{
	#[HttpGet]
	public function home()
	{
		return view('index');
	}

	#[HttpGet('hello')]
	public function helloWorld()
	{
		$hello = 'Hello, world!';

		return view('index', compact('hello'));
	}

	#[HttpGet('not-found')]
	#[NotFound]
	public function notFound(Request $request)
	{
		$url = $request->getURI()->toString();

		return view('layout.not-found', compact('url'));
	}
}