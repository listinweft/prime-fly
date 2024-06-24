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
        Schema::create('locations', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incremented bigint(20) UNSIGNED
            $table->string('title', 191); // varchar(191) utf8mb4_unicode_ci
            $table->string('short_url', 191); // varchar(191) utf8mb4_unicode_ci
            $table->string('icon', 191)->nullable(); // varchar(191) utf8mb4_unicode_ci, nullable
            $table->string('icon_webp', 191)->nullable(); // varchar(191) utf8mb4_unicode_ci, nullable
            $table->string('image', 191)->nullable(); // varchar(191) utf8mb4_unicode_ci, nullable
            $table->string('image_webp', 191)->nullable(); // varchar(191) utf8mb4_unicode_ci, nullable
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
