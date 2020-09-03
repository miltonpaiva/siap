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
            $table->string('name', 100);
            $table->enum('function', ['negócio', 'Produto', 'Marketing']);
            $table->foreign('startup')->references('id')->on('startups');
            $table->string('rg', 22);
            $table->bigInteger('cpf');
            $table->string('institution', 100);
            $table->string('course', 50);
            $table->foreign('formation')->references('id')->on('formations');
            $table->string('address', 100);
            $table->bigInteger('cod_city');
            $table->bigInteger('telephone');
            $table->string('email', 50);
            $table->string('linkedin', 50);
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
