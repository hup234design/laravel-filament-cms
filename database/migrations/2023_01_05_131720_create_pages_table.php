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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('content')->nullable();
            $table->json('header_blocks')->nullable();
            $table->json('content_blocks')->nullable();
            $table->boolean('home')->default(false);
            $table->boolean('visible')->default(true);
            $table->integer('sort_order')->default(1);
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->integer('seo_image_id')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
