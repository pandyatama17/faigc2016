<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProgramsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_programs', function(Blueprint $table)
		{
			$table->integer('member_id')->references('id')->on('members');
			$table->boolean('program1')->default(false);
			$table->boolean('program2')->default(true);
			$table->boolean('program3')->default(false);
			$table->boolean('program4')->default(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_programs');
	}

}
