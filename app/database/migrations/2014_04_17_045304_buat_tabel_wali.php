<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelWali extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wali', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('nama');
			$table->unsignedInteger('id_mahasiswa');
			$table->foreign('id_mahasiswa')->references('id')->on('mahasiswa')->onDelete('CASCADE');

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
		Schema::drop('wali');
	}

}
