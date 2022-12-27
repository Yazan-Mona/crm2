<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectfiles', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('ExteriorStreet')->nullable();
            $table->string('Interior')->nullable();
            $table->string('PublicRealm')->nullable();
            $table->string('RearYardArea')->nullable();
            $table->string('Factsheet')->nullable();
            $table->string('Finishes')->nullable();
            $table->string('Floor_Plan')->nullable();
            $table->string('Lifestyle_Images')->nullable();
            $table->string('Master_Plan')->nullable();
            $table->string('Payment_Plan')->nullable();
            $table->string('brochure')->nullable();
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
        Schema::dropIfExists('projectfiles');
    }
}
