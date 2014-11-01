<?php
/**
 * Created by PhpStorm.
 * User: bkanber
 * Date: 11/1/14
 * Time: 12:33 PM
 */

use Dissect\Parser\Grammar;

class CommandGrammar extends Grammar
{
	public function __construct()
	{
		$this('CreateGuild')
			->is('create', 'guild', 'word')
			->call(function ($c, $c, $name) {
				echo "Create guild {$name->getValue()}";
			});

		$this('JoinGuild')
			->is('join', 'guild', 'word')
			->call(function ($c, $c, $name) {
				echo "Join guild {$name->getValue()}";
			});

		$this->start('CreateGuild');

	}

} 