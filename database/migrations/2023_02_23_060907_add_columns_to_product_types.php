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
        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag_id');
            $table->string('product_id');
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
<<<<<<<< HEAD:database/migrations/2023_02_23_061843_create_product_tags_table.php
        Schema::dropIfExists('product_tags');
========
        Schema::table('product_types', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
>>>>>>>> 82adb98e97f364609680acd1ef03330ac9f95b65:database/migrations/2023_02_23_060907_add_columns_to_product_types.php
    }
};
