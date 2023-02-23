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
<<<<<<<< HEAD:database/migrations/2023_02_20_120717_add_address_type_to_customer_addresses_table.php
        Schema::table('customer_addresses', function (Blueprint $table) {
            $table->string('address_type');
========
        Schema::table('sizes', function (Blueprint $table) {
            $table->text('image')->nullable();
            $table->text('image_webp')->nullable();
            $table->string('image_attribute')->nullable();
>>>>>>>> 82adb98e97f364609680acd1ef03330ac9f95b65:database/migrations/2023_02_23_063559_add_columns_to_sizes.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2023_02_20_120717_add_address_type_to_customer_addresses_table.php
        Schema::table('customer_addresses', function (Blueprint $table) {
            $table->dropColumn('address_type');
========
        Schema::table('sizes', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('image_webp');
            $table->dropColumn('image_attribute');
>>>>>>>> 82adb98e97f364609680acd1ef03330ac9f95b65:database/migrations/2023_02_23_063559_add_columns_to_sizes.php
        });
    }
};
