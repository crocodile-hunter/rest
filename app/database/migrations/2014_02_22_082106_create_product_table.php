<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table)
        {
            $table->increments('id');
            $table->string('SKU')->unique();
            $table->string('seller_name');
            $table->text('title');
            $table->longText('description');
            $table->float('price');
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
		 Schema::drop('products');
	}

}