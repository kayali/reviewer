<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatQualitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('cat_qualities', function($table)
        {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('cat_value');
            $table->string('cat_quality_eng_uk',155);
            $table->string('cat_quality_ar_eg',155);
            $table->string('cat_quality_ar_ps',155);

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
