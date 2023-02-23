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
        Schema::table('shapes', function (Blueprint $table) {
            $table->text('image')->nullable();
            $table->text('image_webp')->nullable();
            $table->string('image_attribute')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shapes', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('image_webp');
            $table->dropColumn('image_attribute');
        });
    }
};
