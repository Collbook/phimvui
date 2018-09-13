<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_films', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('director_id')->unsigned();
            $table->foreign('director_id')->references('id')->on('directors')
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
        Schema::dropIfExists('director_films');
    }
}
