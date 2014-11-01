<?php
/**
 * Created by PhpStorm.
 * User: bkanber
 * Date: 11/1/14
 * Time: 12:22 PM
 */

use Dissect\Lexer\SimpleLexer;

class CommandLexer extends SimpleLexer
{
	public function __construct()
	{
		$this->token('member');
		$this->token('describe');
		$this->token('all');
		$this->token('guild');
		$this->token('quest');
		$this->token('create');
		$this->token('update');
		$this->token('help');
		$this->token('join');
		$this->token('show');
		$this->token('challenge');
		$this->regex('who', '/^(me|@\w+)/');
		$this->regex('wsp', '/^[ \r\n\t]+/');
		$this->regex('word', '/^\w+/');

		$this->skip('wsp');
	}

} 