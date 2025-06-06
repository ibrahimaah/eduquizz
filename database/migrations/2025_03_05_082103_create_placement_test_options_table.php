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
        Schema::create('placement_test_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('placement_test_questions')->onDelete('cascade'); // Reference to questions table
            $table->string('option');  // The option text
            $table->boolean('is_correct')->default(false);  // Whether the option is correct or not
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placement_test_options');
    }
};
