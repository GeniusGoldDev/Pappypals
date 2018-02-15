<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('uid');
			$table->string('product_id')->nullable();
			$table->timestamps();
			$table->string('transaction_id')->nullable();
			$table->string('original_transaction_id')->nullable();
			$table->string('purchase_date')->nullable();
			$table->string('purchase_date_ms')->nullable();
			$table->string('purchase_date_pst')->nullable();
			$table->string('original_purchase_date')->nullable();
			$table->string('original_purchase_date_ms')->nullable();
			$table->string('original_purchase_date_pst')->nullable();
			$table->string('expires_date')->nullable();
			$table->string('expires_date_ms')->nullable();
			$table->string('expires_date_pst')->nullable();
			$table->string('web_order_line_item_id')->nullable();
			$table->string('is_trial_period')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchases');
	}

}
