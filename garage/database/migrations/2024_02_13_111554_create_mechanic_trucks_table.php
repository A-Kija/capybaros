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
        Schema::create('mechanic_trucks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mechanic_id');
            $table->unsignedBigInteger('truck_id');
            $table->unique(['mechanic_id', 'truck_id']);
            $table->foreign('mechanic_id')->references('id')->on('mechanics')->onDelete('cascade');
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mechanic_trucks');
    }
};
