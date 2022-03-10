<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_songs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
             $table->string('invoice_id');
              $table->string('autor_id');
            $table->string('song_name');
            $table->string('song_id');
            $table->string('price');
            $table->string('subtotal');
           $table->string('quantity');
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
        Schema::dropIfExists('sell_songs');
    }
}
