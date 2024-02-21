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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment("Blog Başlığı");
            $table->longText('content')->nullable()->comment("Blog İçeriği");
            $table->string('image')->nullable()->comment("Blog resminin url bağlantısı");
            $table->integer('hit')->default(0)->comment("okunma sayısı");
            $table->integer('like')->default(0)->comment("beğeni sayısı");
            $table->integer('dislike')->default(0)->comment("beğenmeme sayısı");
            $table->string('author')->nullable()->comment("Blog ");
            $table->integer('user_id')->default(0)->comment("Yazar id si");
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
        Schema::dropIfExists('blogs');
    }
};
