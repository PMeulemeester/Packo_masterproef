<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_tanks', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('tank_id')->unsigned();
			$table->foreign('tank_id')->references('id')->on('tank_sorts');
			$table->string('filename');
			$table->integer('versie');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_tanks',function(Blueprint $table){
			$table->dropForeign('user_tanks_user_id_foreign');
			$table->dropForeign('user_tanks_tank_id_foreign');
		});
		Schema::drop("user_tanks");
	}

}
