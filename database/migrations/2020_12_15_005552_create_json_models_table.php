<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJsonModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('json_models', function (Blueprint $table) {
            $table->id();
            ## Custom Fields
            $table->datetime('date');
            $table->integer('trade_code');
            $table->integer('high');
            $table->integer('low');
            $table->integer('open');
            $table->integer('close');
            $table->integer('volume');
            ## End Custom Fields
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
        Schema::dropIfExists('json_models');
    }
}
