<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_vi')->unique();
            $table->string('slug');
            $table->string('parent_film_id')->nullable();
            $table->string('title_en')->unique();
            $table->string('img_thumbnail');
            $table->string('img_background');
            $table->text('description');
            $table->integer('time');
            $table->tinyInteger('status');
            $table->string('date_theater')->nullable();
            $table->string('quality');
            $table->string('resolution');
            $table->float('IMDb', 2, 1);
            $table->string('company_production');
            $table->integer('view_count')->default(0);
            $table->integer('published_year')->nullable();
            $table->boolean('film_hot');
            $table->boolean('film_cinema');
            $table->tinyInteger('film_type');

            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')
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
        Schema::dropIfExists('films');
    }
}
