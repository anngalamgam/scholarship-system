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
        Schema::create('approved_applicants', function (Blueprint $table) {

            $table->id();

            // ORIGINAL STUDENT RECORD ID
            $table->foreignId('student_record_id')
                  ->constrained('student_records')
                  ->onDelete('cascade');

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | STUDENT PROFILE
            |--------------------------------------------------------------------------
            */

            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            $table->integer('age')->nullable();

            $table->date('birth_date')->nullable();

            $table->string('gender')->nullable();

            $table->string('contact_number')->nullable();

            $table->string('email')->nullable();

            $table->text('address')->nullable();

            /*
            |--------------------------------------------------------------------------
            | EDUCATIONAL ATTAINMENT
            |--------------------------------------------------------------------------
            */

            $table->string('elementary_school')->nullable();
            $table->string('elementary_year')->nullable();

            $table->string('highschool_school')->nullable();
            $table->string('highschool_year')->nullable();

            $table->string('college_school')->nullable();
            $table->string('college_course')->nullable();
            $table->string('college_year')->nullable();

            /*
            |--------------------------------------------------------------------------
            | FAMILY BACKGROUND
            |--------------------------------------------------------------------------
            */

            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();

            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();

            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact')->nullable();

            $table->string('annual')->nullable();

            /*
            |--------------------------------------------------------------------------
            | APPROVAL
            |--------------------------------------------------------------------------
            */

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approved_applicants');
    }
};