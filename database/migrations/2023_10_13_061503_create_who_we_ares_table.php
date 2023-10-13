<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhoWeAresTable extends Migration
{
    public function up()
    {
        Schema::create('who_we_ares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('subtitle', 191);
            $table->longText('description')->nullable();
            $table->text('image')->nullable();
            $table->text('image_webp')->nullable();
            $table->timestamp('image_attribute')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('who_we_ares');
    }
}