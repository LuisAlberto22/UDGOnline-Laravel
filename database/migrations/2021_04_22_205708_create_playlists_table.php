<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('number_videos');
            $table->unsignedBigInteger('visibility_id');
            $table->unsignedBigInteger('lessons_id');
            $table->foreign('lessons_id')->references('id')->on('lessons')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('visibility_id')->references('id')->on('visibilities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::table('videos',function (Blueprint $table){
            $table->foreign('play_list_id')->references('id')->on('playlists')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlists');
    }
}
