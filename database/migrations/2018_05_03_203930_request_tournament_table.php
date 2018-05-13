<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestTournamentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('request_tournament_tables', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('user_requester_id')->unsigned()->nullable();
			$table->integer('user_responser_id')->unsigned()->nullable();
			$table->integer('tournament_id')->unsigned();
		});

		/*Schema::table('requestTable', function (Blueprint $table) {
			$table->foreign('playground_id')->references('id')->on('playgrounds')->onDelete('cascade');
			$table->foreign('user_requester_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('user_responser_id')->references('id')->on('users')->onDelete('cascade');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('request_tournament_tables');
	}
}
