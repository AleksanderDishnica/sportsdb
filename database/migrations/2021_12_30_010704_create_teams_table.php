<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('teamId');
            $table->string('name');
            $table->string('stadiumName');
            $table->string('website');
            $table->string('descriptionEN');
            $table->integer('rank');
            $table->integer('goalsFor');
            $table->integer('goalsAgainst');
            $table->integer('goalDifference');
            $table->integer('wins');
            $table->integer('loss');
            $table->integer('draw');
            $table->integer('points');
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
        Schema::dropIfExists('teams');
    }
}
