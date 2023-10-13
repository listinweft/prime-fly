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
        Schema::table('who_we_ares', function (Blueprint $table) {
            Schema::table('who_we_ares', function (Blueprint $table) {
                $table->text('banner_image')->nullable()->after('image_webp');
                $table->text('banner_image_webp')->nullable()->after('banner_image');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('who_we_ares', function (Blueprint $table) {
            Schema::table('who_we_ares', function (Blueprint $table) {
                $table->dropColumn('banner_image');
                $table->dropColumn('banner_image_webp');
            });
        });
    }
};
