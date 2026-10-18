<?php
namespace App\Controllers\Console;

use PSharp\Console\CommandBase;
use PSharp\Console\CommandLine;
use PSharp\Console\Signature;

#[Signature('test {topic} {subtopic?}')]
class TestCommand extends CommandBase
{
	public function handle(CommandLine $input)
	{
		$passos = 'This is a test.';

		echo($passos);
	}
}