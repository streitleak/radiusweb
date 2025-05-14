<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatewayTables extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('gateway')) {
			Schema::create('gateway', function (Blueprint $table) {          
				$table->increments('gateway_id');
				$table->string('ip',15)->nullable(false);
				$table->integer('rate')->nullable(false)->default('0');
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
        Schema::dropIfExists('gateway');
    }
}		