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
        Schema::table('products', function (Blueprint $table) {
            //

            $table->double('price')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2023_02_22_093140_add_price_in_products_table.php
        Schema::table('products', function (Blueprint $table) {
            //
========
        Schema::table('sizes', function (Blueprint $table) {
            $table->dropColumn('sort_order');
>>>>>>>> 82adb98e97f364609680acd1ef03330ac9f95b65:database/migrations/2023_02_23_060944_add_columns_to_sizes.php
        });
    }
};
