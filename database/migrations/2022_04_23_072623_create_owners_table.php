<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->nullable();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('emirate_id_number')->nullable();
            $table->string('source')->nullable();
            $table->string('email')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mobile');
            $table->string('alternate_mobile')->nullable();
            $table->string('file')->nullable();
            $table->string('state')->nullable();
            $table->string('unitNo')->nullable();
            $table->string('call')->nullable();  
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
        Schema::dropIfExists('owners');
    }
}
