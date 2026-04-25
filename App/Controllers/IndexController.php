<?php
namespace App\Controllers;

use PSharp\Http\Route;
use PSharp\Http\Actions\ControllerBase;
use PSharp\Http\Methods\{HttpGet, HttpPost};

#[ApiController]
#[Route('/')]
class IndexController extends ControllerBase
{
	#[HttpGet(name: 'home')]
	public function home()
	{
		view('index');
	}

	#[HttpPost(path: 'hello')]
	public function helloWorld()
	{
		view('hello');
	}
}