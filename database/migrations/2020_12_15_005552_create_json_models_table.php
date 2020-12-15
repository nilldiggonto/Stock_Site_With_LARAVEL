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
            $table->string('date');
            $table->string('trade_code');
            $table->string('high');
            $table->string('low');
            $table->string('open');
            $table->string('close');
            $table->string('volume');
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
