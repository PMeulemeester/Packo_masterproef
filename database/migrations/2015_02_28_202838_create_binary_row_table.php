<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinaryRowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('binary_row', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('date');
			$table->string('type');
			$table->string('temp');
			$table->string('active_process');
			$table->string('active_electric_component');
			$table->string('temp_difference');
			$table->string('event_process');
			$table->string('error');
			$table->string('filename');
			$table->integer('tank_id')->unsigned();
			$table->foreign('tank_id')->references('id')->on('tank_sorts');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('binary_row',function(Blueprint $table){
			$table->dropForeign('binary_row_user_id_foreign');
			$table->dropForeign('binary_row_tank_id_foreign');
		});
		Schema::drop("binary_row");
	}

}
