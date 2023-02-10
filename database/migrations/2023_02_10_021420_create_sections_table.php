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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_category_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('title');
            $table->text('content')
                ->nullable();
            $table->integer('featured_image_id')
                ->unsigned()
                ->nullable();
            $table->integer('sort_order')
                ->default(1);
            $table->timestamps();

            $table->foreign('featured_image_id', 'featured_image_id')
                ->references('id')->on('media')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
};
