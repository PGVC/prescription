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
        Schema::create('add_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('patienname');
            $table->string('con_num')->unique();
            $table->timestamp('con_num_verified_at')->nullable();
            $table->string('age');
            $table->date('date');
            $table->time('time');
            $table->string('symtoms');
            $table->string('doctor_id');
            $table->string('location_id');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_bookings');
    }
};
