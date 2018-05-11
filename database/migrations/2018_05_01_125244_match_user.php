<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatchUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('match_users', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('match_id')->unsigned();
			$table->integer('team')->nullable();
		});

		/*Schema::table('match_user', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('match_users');
	}
}
