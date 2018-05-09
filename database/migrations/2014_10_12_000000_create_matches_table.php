<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('matches', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->date('date');
			$table->time('time');
			$table->integer('playground_id')->unsigned();
			$table->string('type');
			$table->string('status')->nullable();
			$table->timestamps();
		});

		/*Schema::table('matches', function (Blueprint $table) {
			$table->foreign('playground_id')->references('id')->on('playgrounds')->onDelete('cascade');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('matches');
	}
}
