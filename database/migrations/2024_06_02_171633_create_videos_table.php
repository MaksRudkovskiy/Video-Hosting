<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('videos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('category');
        $table->string('video_path');
        $table->integer('likes')->default(0);
        $table->integer('dislikes')->default(0);
        $table->enum('restriction', ['none', 'violation', 'shadow_ban', 'ban'])->default('none');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('videos');
}
};
