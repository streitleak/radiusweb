<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateTables extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('rate')) {
			Schema::create('rate', function (Blueprint $table) {          
				$table->increments('rate_id');
				$table->string('cc',4)->nullable(false)->unique();
				$table->string('ac',4)->nullable(false);
				$table->string('cac',8)->nullable(false);
				$table->string('conturyname',100)->nullable(false);
				$table->integer('timeunit')->nullable(false)->default(0);
				$table->integer('rate')->nullable(false)->default(0);
				$table->timestamps();
				$table->string('remark');
			});
		}
		if (!Schema::hasTable('gateway_rate')) {
			Schema::create('gateway_rate', function (Blueprint $table) {
				$table->integer('gid')->nullable(false);
				$table->integer('rid')->nullable(false);
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
        Schema::dropIfExists('rate');
		Schema::dropIfExists('gateway_rate');
    }
}		