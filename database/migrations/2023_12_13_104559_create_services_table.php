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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('short_url');
            $table->string('sku');
            $table->longText('category_id');
            $table->longText('sub_category_id')->nullable();
            $table->longText('description')->nullable();
            $table->string('capacity')->nullable();
        
            $table->decimal('price', 9, 2);
            $table->longText('thumbnail_image')->nullable();
            $table->longText('thumbnail_image_webp')->nullable();
            $table->longText('thumbnail_image_attribute')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_sub_title')->nullable();
            $table->longText('desktop_banner')->nullable();
            $table->longText('desktop_banner_webp')->nullable();
            $table->longText('mobile_banner')->nullable();
            $table->longText('mobile_banner_webp')->nullable();
            $table->string('banner_attribute')->nullable();
            $table->string('warranty')->default(0);
            $table->enum('type', ['departure', 'arrival', 'round_trip', 'transit_type'])->default('departure');
            // Add Origin, Terminal, Entry Date, Entry Time, Exit Date, Exit Time, Visitors Count
            $table->string('origin')->nullable();
            $table->string('terminal')->nullable();
            $table->date('entry_date')->nullable();
            $table->time('entry_time')->nullable();
            $table->date('exit_date')->nullable();
            $table->time('exit_time')->nullable();
            $table->integer('visitors_count')->nullable();
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
        Schema::dropIfExists('services');
    }
};
