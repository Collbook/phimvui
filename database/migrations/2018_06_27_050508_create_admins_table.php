<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 30)->nullable();
            $table->string('email',30)->unique();
            $table->string('fullname', 30);
            $table->tinyInteger('status')->default(1);
            $table->date('birthday')->nullable();
            $table->string('avatar', 15)->nullable();
            $table->string('password', 100);
            $table->tinyInteger('level')->default(0);
            $table->tinyInteger('active')->default(0);
            $table->string('email_token')->nullable();
            $table->date('time_lock_end')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
