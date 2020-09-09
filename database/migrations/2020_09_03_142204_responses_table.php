<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question');
            $table->unsignedBigInteger('option');
            $table->unsignedBigInteger('startup');
            $table->foreign('question')->references('id')->on('questions');
            $table->foreign('option')->references('id')->on('options');
            $table->foreign('startup')->references('id')->on('startups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
}
