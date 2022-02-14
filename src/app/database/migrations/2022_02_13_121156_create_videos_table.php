<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('title');
            $table->text('des');
            $table->string('url');
            $table->boolean('published')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('videos_tags', function (Blueprint $table) {
            $table->foreignId('video_id')->index();
            $table->foreignId('tag_id')->index();
            $table->unique(['video_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
