<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre', 255);
            $table->text('description');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('groupe_id');
            

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
            
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
        Schema::dropIfExists('postes');
    }
}
