<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttractiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractive', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('startup');
            $table->unsignedBigInteger('criterea');
            $table->mediumText('response');
            $table->foreign('startup')->references('id')->on('startups');
            $table->foreign('criterea')->references('id')->on('criterea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attractive');
    }
}
