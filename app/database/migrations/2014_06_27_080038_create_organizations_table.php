<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('organizations', function($table)
        {
            $table->increments('id');
            $table->string('o_name',155);
            $table->string('o_email',255);
            $table->string('o_country',155);
            $table->string('o_city',155);
            $table->double('lat', 15, 15);
            $table->double('long',15,15);
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
