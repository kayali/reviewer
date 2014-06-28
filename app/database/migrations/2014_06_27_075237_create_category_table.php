<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('categories', function($table)
        {
            $table->increments('id');
            $table->text('cat_semantic');
            $table->string('eng_uk',155);
            $table->string('ar_ps',155);
            $table->string('ar_eg',155);
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
