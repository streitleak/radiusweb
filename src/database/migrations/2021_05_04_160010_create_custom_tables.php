<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomTables extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('custom')) {
			Schema::create('custom', function (Blueprint $table) {          
				$table->increments('custom_id');
				$table->string('name')->nullable(false);
				$table->string('account')->nullable(false);
				$table->string('tel');
				$table->string('cell');
				$table->string('address');
				$table->string('id');
				$table->string('postalcode');
				$table->timestamps();
				$table->string('remark');
			});
		}
	}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom');
    }
}		