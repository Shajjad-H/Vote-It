<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupeVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupe_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vote_id');
            $table->unsignedInteger('groupe_id');

            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
            $table->foreign('vote_id')->references('id')->on('votes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupe_votes');
    }
}
