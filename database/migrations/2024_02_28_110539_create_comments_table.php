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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment("yorum yapan");
            $table->string('commented')->nullable()->comment("yorum yaptı");
            $table->integer('viewed')->default(0)->comment("okundu ise 1");
            $table->integer('liked')->default(0)->comment("beğendi ise 1");
            $table->integer('disliked')->default(0)->comment("beğenmedi ise 1");
            $table->integer('blog_id')->default(0)->comment("blog yazısının id si");
            $table->string('ip')->nullable();
            $table->timestamps();
            $table->foreign('blog_id')
            ->references('id')
            ->on('blogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
