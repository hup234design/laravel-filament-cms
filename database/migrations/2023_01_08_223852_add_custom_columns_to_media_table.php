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
        Schema::table('media', function (Blueprint $table) {
            $table->text('original_filename')->after('original_media_id')->nullable();
            $table->string('alt')->after('original_filename')->nullable();
            $table->text('caption')->after('alt')->nullable();
            $table->text('description')->after('caption')->nullable();
            $table->json('crop_data')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn('crop_data');
            $table->dropColumn('description');
            $table->dropColumn('caption');
            $table->dropColumn('alt');
            $table->dropColumn('original_filename');
        });
    }
};
