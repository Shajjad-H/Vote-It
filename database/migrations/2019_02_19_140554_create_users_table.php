<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('ps_fname', 192)->unique();
            $table->string('pseudo', 128)->unique();
            //$table->string('fullname', 64)->index();
            $table->string('email', 64)->index();
            $table->boolean('sex');

            //$table->string('filiere', 64)->nullable();
            $table->boolean('confirmed')->default(false);

            

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
        Schema::dropIfExists('users');
    }
}
