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
		Schema::create('members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->enum('type', array(
											'Delegate €450.00',
											'FAI President',
											'FAI Executive Directors',
											'FAI Secretary General',
											'FAI Headquarters Staff',
											'President of Air Sport Commissions and Technical Commission',
											'FAI President of Honour (i.e. former Presidents of FAI)',
											'Award Winners',
											'FAI Companions of Honour €350.00'
										));
			$table->enum('title', array('Mr.','Mrs.','Miss.'));
			$table->string('first_name');
			$table->string('family_name');
			$table->enum('gender',array('male','female'));
			$table->string('job_title')->nullable();
			$table->string('organisation');
			$table->string('department')->nullable();
			$table->integer('zip');
			$table->string('city');
			$table->string('country');
			$table->string('phone');
			$table->string('fax')->nullable();
			$table->string('mobile');
			$table->string('cc_email')->nullable();
			$table->string('passport_number');
			$table->enum('dietary_request', array(
														'no',
														'vegetarian_fish',
														'vegetarian_no_fish',
														'vegan',
														'other'
													))->default('no');
			$table->string('dietary_request_other')->nullable();
			$table->string('avatar')->nullable();
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
