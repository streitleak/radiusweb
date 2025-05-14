<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTables extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('fwiring')) {
			Schema::create('fwiring', function (Blueprint $table) {          
				$table->increments('record_id');
				$table->string('from')->nullable(false);
				$table->string('to')->nullable(false);
				$table->integer('points')->nullable(false)->default('0');			
				$table->timestamp('wiring_at')->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
				$table->string('remark');
			});
		}
		if (!Schema::hasTable('bwiring')) {
			Schema::create('bwiring', function (Blueprint $table) {          
				$table->increments('record_id');
				$table->string('from')->nullable(false);
				$table->string('to')->nullable(false);
				$table->integer('points')->nullable(false)->default('0');			
				$table->timestamp('wiring_at')->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('fwiring');
		Schema::dropIfExists('bwiring');
    }
}		