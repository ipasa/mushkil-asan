<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){

		Schema::create('users', function($table){
            $table  ->  increments('user_id');
            $table  ->  primary('user_id');
            $table  ->  text('username');
            $table  ->  text('fullname');
            $table  ->  text('email');
            $table  ->  text('password');
            $table  ->  text('password_temp');
            $table  ->  text('code');
            $table  ->  integer('active');
            $table  ->  rememberToken();
            $table  ->  timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){

        Schema::drop('users');
	}

}
