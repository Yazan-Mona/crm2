<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listdatas', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('emirate_id_number')->nullable();
            $table->string('status')->nullable();
            $table->string('unit_number')->nullable();
            $table->string('email')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mobile');
            $table->string('alternate_mobile')->nullable();
            $table->string('comment')->nullable();
            $table->string('contact')->nullable();
            $table->string('project')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('listdatas');
    }
}
