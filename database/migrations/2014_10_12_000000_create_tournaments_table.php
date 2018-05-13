<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Fluent;

class CreateTournamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tournaments', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->date('date_of_start');
			$table->date('date_of_finish');
			$table->string('time');
			$table->integer('playground_id')->unsigned();
			$table->integer('max_players');
			$table->timestamps();
		});

		/*Schema::table('tournaments', function (Blueprint $table) {
			$table->foreign('playground_id')->references('id')->on('playgrounds')->onDelete('cascade');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tournaments');
	}
}
