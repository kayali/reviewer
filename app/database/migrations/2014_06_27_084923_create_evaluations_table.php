<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('evaluations', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('organization_id');
            $table->integer('template_id');
            $table->date('date');
            $table->text('eval_verbalized');
            $table->text('eval_updated');
            $table->decimal('avg',5,2);
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
