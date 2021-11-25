<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('story_id')->unsigned()->nullable(false);
            $table->foreign('story_id')->references('id')->on('stories');
            $table->bigInteger('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('path');
            $table->string('file_type');
            $table->string('file_size');
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
        Schema::dropIfExists('medias');
    }
}
