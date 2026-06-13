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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name')->nullable();
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('userpass')->nullable();
            $table->integer('dept_id')->default(1002);
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('skype')->nullable();
            $table->string('fee')->nullable();
            $table->integer('active')->default(11);
            $table->integer('c_id')->nullable();
            $table->string('city')->nullable();
            $table->integer('m_id')->default(1);
            $table->string('date')->nullable();
            $table->integer('currency_id')->default(1);
            $table->integer('mode_id')->default(1);
            $table->string('belong')->nullable();
            $table->integer('timezone')->default(1);
            $table->string('trial_date')->nullable();
            $table->string('regular_date')->nullable();
            $table->string('leave_date')->nullable();
            $table->string('deactivation_date')->nullable();
            $table->string('suspension_date')->nullable();
            $table->integer('csr_id')->nullable();
            $table->integer('invoice_type')->default(1);
            $table->integer('payment_cycle')->default(1);
            $table->string('order_num')->nullable();
            $table->string('real_fee')->default('0');
            $table->string('discount')->default('0');
            $table->string('group_id')->default('Student Testing QS');
            $table->string('group_new_id')->nullable();
            $table->string('rate')->default('8');
            $table->integer('subscription')->default(1);
            $table->string('whats_email')->default('email');
            $table->integer('zoomaction')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
