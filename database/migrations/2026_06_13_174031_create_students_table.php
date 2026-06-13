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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('family_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('dept_id')->nullable();
            $table->integer('adept_id')->default(108);
            $table->timestamp('date_of_joining')->useCurrent();
            $table->string('skype_id')->nullable();
            $table->string('age')->nullable();
            $table->integer('g_id')->nullable();
            $table->integer('lan_id')->nullable();
            $table->integer('c_id')->nullable();
            $table->string('status')->nullable();
            $table->string('number_of_days')->nullable();
            $table->integer('fee')->nullable();
            $table->integer('teacher_id')->default(1);
            $table->string('trial_class', 1000)->nullable();
            $table->string('remark_teacher', 1000)->nullable();
            $table->integer('nature')->default(1);
            $table->integer('m_id')->default(1);
            $table->integer('active')->default(11);
            $table->integer('tz_id')->nullable();
            $table->string('timezone')->nullable();
            $table->string('time_name')->nullable();
            $table->string('date')->nullable();
            $table->string('php_tz')->nullable();
            $table->string('regular_date')->nullable();
            $table->integer('csr_id')->nullable();
            $table->string('rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
