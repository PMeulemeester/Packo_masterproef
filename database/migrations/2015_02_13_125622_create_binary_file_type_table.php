<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinaryFileTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('binary_file_type', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->integer('type_id')->unsigned();
			$table->string('type');
			$table->integer('length');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("binary_file_type");
	}

}
