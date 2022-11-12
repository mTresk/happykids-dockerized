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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('title');
            $table->string('price')->nullable();
            $table->text('extra')->nullable();
            $table->string('badge')->nullable();
            $table->string('schedule')->nullable();
            $table->text('price_extra')->nullable();
            $table->text('section')->nullable();
            $table->text('lesson')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('grades');
    }
};
