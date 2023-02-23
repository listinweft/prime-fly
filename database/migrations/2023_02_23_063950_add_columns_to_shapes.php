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
<<<<<<<< HEAD:database/migrations/2023_02_23_061336_create_table_product_size_table.php
        Schema::create('product_size', function (Blueprint $table) {
            $table->id();
            $table->string('size_id');
            $table->string('product_id');
            $table->timestamps();
========
        Schema::table('shapes', function (Blueprint $table) {
            $table->text('image')->nullable();
            $table->text('image_webp')->nullable();
            $table->string('image_attribute')->nullable();
>>>>>>>> 82adb98e97f364609680acd1ef03330ac9f95b65:database/migrations/2023_02_23_063950_add_columns_to_shapes.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2023_02_23_061336_create_table_product_size_table.php
        Schema::dropIfExists('table_product_size');
========
        Schema::table('shapes', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('image_webp');
            $table->dropColumn('image_attribute');
        });
>>>>>>>> 82adb98e97f364609680acd1ef03330ac9f95b65:database/migrations/2023_02_23_063950_add_columns_to_shapes.php
    }
};
