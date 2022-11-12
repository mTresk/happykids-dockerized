<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('recruiting')->nullable();
            $table->string('recruiting_full')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_text')->nullable();
            $table->json('education')->nullable();
            $table->json('advantages')->nullable();
            $table->string('advantages_image')->nullable();
            $table->json('we_choose')->nullable();
            $table->json('we_abandoned')->nullable();
            $table->json('admission')->nullable();
            $table->json('faq')->nullable();
            $table->string('slider')->nullable();
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
        Schema::dropIfExists('home_pages');
    }
};
