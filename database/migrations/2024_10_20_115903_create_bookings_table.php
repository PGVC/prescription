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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Create foreign key columns without the foreignId() helper
            $table->unsignedBigInteger('user_id');            
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('patient_id');

            $table->string('center_name');
            $table->string('doctor_name');
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['pending', 'complete'])->default('pending');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
