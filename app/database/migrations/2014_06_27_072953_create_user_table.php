<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('user_name',155);
            $table->string('email',255);
            $table->string('user_country',155);
            $table->string('user_language',155);
            $table->date('birth_date');
            $table->tinyInteger('gender');
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
		//
	}

}
