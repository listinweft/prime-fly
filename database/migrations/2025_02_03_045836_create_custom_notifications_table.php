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
        Schema::create('custom_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User receiving the notification
            $table->string('message'); // Notification message
            $table->enum('status', ['active', 'inactive'])->default('active'); // Admin control
            $table->enum('notification_status', ['on', 'off'])->default('on'); // User control
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
        Schema::dropIfExists('custom_notifications');
    }
};
