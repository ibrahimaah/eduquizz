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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('question_number');
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['multiple_choice', 'true_false']);
            $table->text('question');
            $table->boolean('correct_answer')->nullable(); // Stores true/false for true/false questions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
