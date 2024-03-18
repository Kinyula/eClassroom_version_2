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
        Schema::create('assignment_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructors_id')->nullable()->constrained('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('student_id')->nullable()->constrained('students')->onDelete('cascade')->onUpdate('cascade');
            $table->string('scores');
            $table->string('total_number_of_questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_scores');
    }
};
