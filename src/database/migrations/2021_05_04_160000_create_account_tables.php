<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTables extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('accounts', function (Blueprint $table) {          
            $table->increments('record_id');
			$table->string('account')->nullable(false);
			$table->string('password')->nullable(false);
			$table->string('account_serial')->nullable(false);
			$table->integer('points')->nullable(false)->default('0');
			$table->integer('group')->nullable(false)->default('0');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->nullable(true);
			$table->string('remark');
        });
		Schema::create('account_group', function (Blueprint $table) {
			$table->Increments('group_id');
			$table->integer('segement')->nullable(false);
			$table->integer('startat')->nullable(false);
			$table->integer('stopat')->nullable(false);
			$table->integer('remark');
		});
	}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
		Schema::dropIfExists('account_group');
    }
}		