<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedDecimal('score')->default(0);
            $table->foreign('user_id')->references('key')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('lesson_id')->references('id')->on('lessons')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary([
                'user_id',
                'lesson_id'
            ]);
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
        Schema::dropIfExists('lesson_user');
    }
}
