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
        Schema::create('room_accesses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();

            $table->string('day_of_week');
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();

            $table->index(['employee_id', 'day_of_week']);
            $table->index(['room_id', 'day_of_week']);

            $table->unique(['employee_id', 'room_id', 'day_of_week', 'start_time', 'end_time'], 'unique_employee_room_slot');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_accesses');
    }
};
