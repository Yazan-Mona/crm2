<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->nullable();
            $table->string('purpose')->nullable();
            $table->string('rent_pricing_duration')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('beds')->nullable();
            $table->integer('baths')->nullable();
            $table->float('plotarea_size', 15, 2)->nullable();
            $table->string('plotarea_size_postfix')->nullable();
            $table->float('area_size', 15, 2)->nullable();
            $table->string('area_size_postfix')->nullable();
            $table->string('developer')->nullable();
            $table->longText('note')->nullable();
            $table->longText('description')->nullable();
            $table->string('state')->nullable();
            $table->string('unitNo')->nullable();
            $table->string('available')->nullable();
            $table->string('main_image')->nullable();
            $table->string('images')->nullable();
            $table->string('file')->nullable();
            $table->string('ref')->nullable();
            $table->string('fresh')->default(0);
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
        Schema::dropIfExists('listings');
    }
}
