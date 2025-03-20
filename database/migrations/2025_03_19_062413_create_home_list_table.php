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
        Schema::create('home_list', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('year_of_active')->nullable();
            $table->integer('number_of_customers')->nullable();
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
        Schema::dropIfExists('home_list');
    }
};
