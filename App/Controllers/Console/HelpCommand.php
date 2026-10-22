<?php
namespace App\Controllers\Console;

use PSharp\Console\CommandBase;
use PSharp\Console\CommandLine;
use PSharp\Console\Signature;

/**
 * Help command.
 */
#[Signature('help {topic} {subtopic?}')]
class HelpCommand extends CommandBase
{
	/**
	 * @var string
	 */
	private const FILE = 'storage/app/console/help.json';

	/**
	 * Command handler.
	 * 
	 * @param PSharp\Console\CommandLine $input
	 * @param mixed $topic = null
	 * @param mixed $subtopic = null
	 * @return mixed
	 */
	public function handle(CommandLine $input, $topic = null, $subtopic = null)
	{
		$passos = 'Ajustes de comandos aqui...';

		switch (strtolower($topic)) {
			case 'debug':
				return $this->debugIt(compact('topic','subtopic','input'));
			case 'list':
				return $this->list($subtopic);
			case '':
				return $this->displayHelpPage('help', $topic, $subtopic);
		}

		$this->line("<fg=yellow>-- Not found this topic: $topic</>");

		return 0;
	}

	/**
	 * Help content loader.
	 * 
	 * @param ?string $page = null
	 * @return mixed
	 */
	protected function loadHelpContent(?string $page = null)
	{
		$full = json_decode(file_get_contents(path(self::FILE)));

		if (empty($page)) {
			return $full->pages ?? []; 
		}

		foreach (($full->pages ?? []) as $n => $pageItem) {
			if (($pageItem->name ?? '') == $page) {
				return $pageItem;
			}
		}

		return [];
	}

	/**
	 * Help content display.
	 * 
	 * @param ?string $topic = null
	 * @param ?string $subtopic = null
	 * @return void
	 */
	protected function displayHelpPage(?string $topic = null, ?string $subtopic = null)
	{
		$page = $this->loadHelpContent($topic);

		if (empty($page)) {
			$this->line("<fg=yellow>-- Not found this topic: $topic</>");
			return;
		}

		foreach ($page->content as $part) {
			$this->writeLine(sprintf("\t> <fg=green>%s</>", $part->heading));

			$text = $part->text;
			$part = [];

			while (true) {
				$line = array_shift($text);

				if (is_array($line)) {
					$part[] = $text;
					$text = $line;
				} elseif (is_null($line)) {
					$text = array_pop($part);
				} else {
					$this->writeLine(str_repeat("\t", 2 + count($part)) . $line);
				}

				if (empty($text) && empty($part)) {
					break;
				}
			}
		}
	}

	/**
	 * Debug the given things.
	 * 
	 * @param mixed $things = []
	 * @return void
	 */
	protected function debugIt($things = [])
	{
		$this->writeLine('<fg=yellow>-- DEBUG  START --</>');
		$this->write(print_r($things, true));
		$this->writeLine('<fg=yellow>-- DEBUG  E N D --</>');
	}

	/**
	 * List available commands matching the given filter, or all if no filter.
	 * 
	 * @param ?string $filter = null
	 * @return void
	 */
	protected function list(?string $filter = null)
	{
		$list = $this->holder()->available($filter ?: null);

		if ($count = count($list)) {
			$this->line("<fg=yellow>-- Found $count commands:</>");

			foreach ($list as $item) {
				$this->line("<fg=yellow>\t* $item</>");
			}
		} else {
			$this->line("<fg=yellow>-- Found no corresponding commands.</>");
		}
	}
}