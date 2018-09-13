<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_films', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('actor_id')->unsigned();
            $table->foreign('actor_id')->references('id')->on('actors')
                ->onUpdate('cascade')
                ->onDelete('cascade');;

            $table->integer('film_id')->unsigned();
            $table->foreign('film_id')->references('id')->on('films')
                ->onUpdate('cascade')
                ->onDelete('cascade');;

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
        Schema::dropIfExists('actor_films');
    }
}
