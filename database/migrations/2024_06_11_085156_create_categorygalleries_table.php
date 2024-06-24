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
        Schema::create('categorygalleries', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id');
            $table->enum('media_type', ['Video', 'Image'])->default('Image');
            $table->longText('image');
            $table->longText('image_webp');
            $table->string('image_attribute', 191);
            $table->longText('video_url')->nullable();
            $table->integer('sort_order')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('categorygalleries');
    }
};
