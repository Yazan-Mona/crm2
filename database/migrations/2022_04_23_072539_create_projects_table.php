<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->nullable();
            $table->string('name');
            $table->string('community');
            $table->longText('description');
            $table->string('developer');
            $table->string('emirate');
            $table->string('state')->nullable();
            $table->longText('note')->nullable();
            $table->string('title');
            $table->string('main_image')->nullable();
            $table->string('images')->nullable();
            $table->string('file')->nullable();
            $table->text('property_type')->nullable();
            $table->integer('floor_number')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
