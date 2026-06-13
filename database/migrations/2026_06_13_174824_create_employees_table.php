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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('cnic')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
            $table->string('age')->nullable();
            $table->integer('g_id')->nullable();
            $table->integer('ms_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('qualification1')->nullable();
            $table->string('qualification2')->nullable();
            $table->string('qualification3')->nullable();
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('skype')->nullable();
            $table->string('username')->nullable();
            $table->string('userpass')->nullable();
            $table->string('i_remk')->nullable();
            $table->integer('dept_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->integer('inout_id')->nullable();
            $table->string('time')->nullable();
            $table->integer('active')->default(1);
            $table->string('joining_date')->nullable();
            $table->string('deactive')->nullable();
            $table->string('timezone')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('alt_mobile')->nullable();
            $table->integer('schedule_status')->default(1);
            $table->string('bank')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('account_no')->nullable();
            $table->string('salary_amount')->nullable();
            $table->string('account_title')->nullable();
            $table->foreignId('designation_id')->nullable()->constrained('designations')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
