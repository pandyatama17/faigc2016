<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgralProgramChildrenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('program_child', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id');
			$table->string('title');
			$table->string('time')->nullable();
			$table->string('cost')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('progral_program_children');
	}

}
