<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRealStatePhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_state_photos', function (Blueprint $table) {
            $table->increments('id');
            //Relacionamento
            $table->unsignedInteger('real_state_id');
            //Fotos
            $table->string('photo');
            $table->boolean('is_thumb');

            $table->timestamps();

            //ReferĂȘncia do relacionamento
            $table->foreign('real_state_id')->references('id')->on('real_state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_state_photos');
    }
}
