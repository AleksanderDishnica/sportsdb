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
            $table->index('teamId');
            $table->string('name');
            $table->string('stadiumName')->nullable();
            $table->string('website')->nullable();
            $table->text('descriptionEN')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('goalsFor')->nullable();
            $table->integer('goalsAgainst')->nullable();
            $table->integer('goalDifference')->nullable();
            $table->integer('wins')->nullable();
            $table->integer('loss')->nullable();
            $table->integer('draw')->nullable();
            $table->integer('points')->nullable();
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
