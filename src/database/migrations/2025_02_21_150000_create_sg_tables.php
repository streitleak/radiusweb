<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgTables extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ribbonsg')) {
			Schema::create('ribbonsg', function (Blueprint $table) {
                $table->bigInteger('record_id')->nullable(false)->autoIncrement();
                $table->ipAddress('gwip')->nullable(false)->default('0.0.0.0');
                $table->integer('sgid')->nullable(false)->default(0);
                $table->string('sgname',100)->nullable(false)->default('');
                $table->timestamps();
                $table->primary('record_id');
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
        Schema::dropIfExists('ribbonsg');
    }
}
