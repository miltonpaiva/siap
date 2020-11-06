<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserLinkStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_Link_startups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluator');
            $table->unsignedBigInteger('startup');
            $table->foreign('evaluator')->references('id')->on('users');
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
        Schema::dropIfExists('user_Link_startups');
    }
}
