<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quests', function($table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('guild_id');
			$table->text('description')->nullable();
			$table->integer('assigner_id')->nullable();
			$table->integer('completion_pct')->default(0);
			$table->integer('timeline')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quests');
	}

}
