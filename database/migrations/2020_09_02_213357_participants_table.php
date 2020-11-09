<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('function', ['negócio', 'Produto', 'Marketing']);
            $table->unsignedBigInteger('startup');
            $table->string('rg', 22);
            $table->string('cpf');
            $table->string('institution', 100);
            $table->string('course');
            $table->unsignedBigInteger('formation');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('telephone');
            $table->string('email', 50);
            $table->string('linkedin')->nullable();
            $table->foreign('startup')->references('id')->on('startups');
            $table->foreign('formation')->references('id')->on('formations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
