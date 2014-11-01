<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuildMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guild_member', function($table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('member_id');
			$table->foreign('member_id')->references('id')->on('members');
			$table->integer('guild_id');
			$table->foreign('guild_id')->references('id')->on('guilds');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('guild_member');
	}

}
