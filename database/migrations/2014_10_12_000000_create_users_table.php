<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('sname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->integer('matches')->default(0);
            $table->integer('wins')->default(0);
            $table->float('rating')->default(0);
            $table->string('password')->nullable();
            $table->integer('role_id')->default('0');
            $table->rememberToken();
            $table->timestamps();
	        $table->fulltext('name');
	        $table->fulltext('surname');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
