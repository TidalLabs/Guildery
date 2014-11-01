<?php
/**
 * Created by PhpStorm.
 * User: bkanber
 * Date: 11/1/14
 * Time: 11:57 AM
 */

class Game
{

	public static $actions = [
		[
			'tokens' => ['create', 'guild', 'word'],
			'method' => 'createGuild'
		],
		[
			'tokens' => ['join', 'guild', 'word'],
			'method' => 'joinGuild'
		],
		[
			'tokens' => ['show', 'guild', 'word'],
			'method' => 'showGuild'
		],
		[
			'tokens' => ['create', 'member', 'word'],
			'method' => 'createMember'
		]
	];

	public static function parse($str)
	{
		$lexer = new CommandLexer();
		$stream = $lexer->lex($str);
		$tokens = [];

		foreach ($stream as $token) {
			$tokens[] = $token->getType();
		}
		array_pop($tokens);

		foreach (self::$actions as $action) {
			if ($action['tokens'] === $tokens) {
				self::$action['method']($stream);
			}
		}
	}

	public static function createGuild($stream)
	{
		$guildName = $stream->get(2)->getValue();
		Guild::create(['name' => $guildName]);
	}

	public static function createMember($stream)
	{
		$memberName = $stream->get(2)->getValue();
		Member::create(['name' => $memberName]);
	}

	public static function joinGuild($stream)
	{
		// Todo: enforce $member
		$member = Member::find(1);
		$guildName = $stream->get(2)->getValue();
		$guild = Guild::where('name', '=', $guildName)->firstOrFail();
		$guild->members()->attach($member);
	}
} 