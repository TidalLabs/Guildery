<?php

/**
 * Created by PhpStorm.
 * User: bkanber
 * Date: 11/1/14
 * Time: 11:57 AM
 */
class Game
{

	public static function parse($str)
	{
		$str        = strtolower($str);
		$container  = new \Illuminate\Container\Container();
		$dispatcher = new \Illuminate\Events\Dispatcher($container);
		$router     = new \Illuminate\Routing\Router($dispatcher, $container);

		$router->get("basic", function () {
			echo "Basic!";
		});

		$router->get("create member {member}", function ($memberName) {
			echo Game::createMember($memberName);
		});

		$router->get("create guild {guild}", function ($guildName) {
			echo Game::createGuild($guildName);
		});

		$router->get("join guild {guild}", function ($guildName) {
			echo Game::joinGuild($guildName);
		});

		$router->get("{describe} guild {guild}", function ($describe, $guildName) {
			echo Game::describeGuild($guildName);
		})->where('describe', '(describe|show|tell me about)');


		$request    = \Illuminate\Http\Request::create($str);
		$routeToRun = $router->dispatchToRoute($request);
	}

	public static function createGuild($guildName)
	{
		Guild::create(['name' => $guildName]);
	}

	public static function createMember($memberName)
	{
		Member::create(['name' => $memberName]);
	}

	public static function joinGuild($guildName)
	{
		// Todo: enforce $member
		$member = Member::find(1);
		$guild  = Guild::where('name', '=', $guildName)->firstOrFail();
		$guild->members()->attach($member);
	}

	public static function describeGuild($guildName)
	{
		$guild = Guild::where('name', '=', $guildName)->firstOrFail();
		return $guild->describe();
	}
}