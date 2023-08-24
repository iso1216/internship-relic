<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('traffic_accidents', function (Blueprint $table) {
            $table->id('traffic_accident_id');
            $table->unsignedBigInteger('user_id');
            $table->string('accident_place');
            $table->string('accident_time');
            $table->string('accident_detail');
            $table->timestamps();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_accidents');
    }
};
