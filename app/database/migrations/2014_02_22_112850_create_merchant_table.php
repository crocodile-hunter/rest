<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('merchant', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->string('email')->unique();
            $table->date('created_at');
            $table->date('updated_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('merchant');
	}

}
