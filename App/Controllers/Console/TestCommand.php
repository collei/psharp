<?php
namespace App\Controllers\Console;

use PSharp\Console\CommandBase;
use PSharp\Console\CommandLine;
use PSharp\Console\Signature;

/**
 * Test command.
 */
#[Signature('test {what?}')]
class TestCommand extends CommandBase
{
	/**
	 * Command handler.
	 * 
	 * @param PSharp\Console\CommandLine $input
	 * @return mixed
	 */
	public function handle(CommandLine $input)
	{
		$this->writeLine('<fg=green>This is a test.</>');

		return 0;
	}
}