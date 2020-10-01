<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluator');
            $table->unsignedBigInteger('startup');
            $table->unsignedBigInteger('criterea');
            $table->float('note', 2, 1);
            $table->foreign('evaluator')->references('id')->on('users');
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
        Schema::dropIfExists('rating');
    }
}
