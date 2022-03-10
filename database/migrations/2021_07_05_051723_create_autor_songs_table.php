<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_songs', function (Blueprint $table) {
            $table->id();
             
            $table->string('category_id');
             $table->string('title');
             $table->string('filename');
            $table->string('song');
            $table->string('song_pre');
            $table->string('img');
             $table->string('autor_id');
             $table->string('countory_id');
              $table->string('album_id');
             $table->text('description')->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('autor_songs');
    }
}
