<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function($table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('slack_id')->nullable();
			$table->string('name')->nullable();
			$table->integer('exp')->default(0);
			$table->integer('level')->default(0);
			$table->integer('gold')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
