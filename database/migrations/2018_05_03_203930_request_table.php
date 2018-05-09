<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('request_table', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('user_requester_id')->unsigned();
			$table->integer('user_responser_id')->unsigned();
			$table->date('date');
			$table->time('time');
			$table->integer('playground_id')->unsigned();
			$table->integer('status')->default(0);
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
		Schema::dropIfExists('request_table');
	}
}
