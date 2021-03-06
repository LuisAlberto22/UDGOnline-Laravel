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
            $table->unsignedSmallInteger('number_videos')->nullable()->default(0);
            $table->unsignedBigInteger('visibility_id')->nullable()->default(1);
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('visibility_id')->references('id')->on('visibilities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::table('videos',function (Blueprint $table){
            $table->foreign('playlist_id')->references('id')->on('playlists')->cascadeOnDelete()->cascadeOnUpdate();
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
