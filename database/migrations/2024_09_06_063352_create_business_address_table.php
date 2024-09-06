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
        Schema::create('business_address', function (Blueprint $table) {
            $table->id(); // Primary key with auto-increment
            $table->unsignedBigInteger('customer_id'); // Non-nullable customer_id field
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('gst_number')->nullable();
            $table->timestamps(); // Adds created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_address');
    }
};
