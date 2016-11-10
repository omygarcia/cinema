<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_movie', function (Blueprint $table) {
            $table->increments('id_movie');
            $table->string("name",100);
            $table->string("cast",100);
            $table->string("duration",100);
            $table->timestamps();
            $table->integer("id_genre")->unsigned();
            $table->foreign("id_genre")->references("id_genre")->on("tb_genres");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movies');
    }
}
