<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('passport_number')->nullable();
            // Add other fields as needed, and set them to nullable if they can be empty
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_details');
    }
}
