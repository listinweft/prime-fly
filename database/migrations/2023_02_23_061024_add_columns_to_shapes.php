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
        Schema::create('product_type', function (Blueprint $table) {
            $table->id();
            $table->string('type_id');
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
<<<<<<<< HEAD:database/migrations/2023_02_23_061907_create_product_type_table.php
        Schema::dropIfExists('product_type');
========
        Schema::table('shapes', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
>>>>>>>> 82adb98e97f364609680acd1ef03330ac9f95b65:database/migrations/2023_02_23_061024_add_columns_to_shapes.php
    }
};
