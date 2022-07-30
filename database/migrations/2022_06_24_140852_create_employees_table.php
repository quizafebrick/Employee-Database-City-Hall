<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_no')->unique()->nullable();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('home_address');
            $table->string('birthday');
            $table->string('contact_person');
            $table->string('contact_address');
            $table->string('contact_no');
            $table->string('applicant_no');
            $table->string('position');
            $table->foreignId('office_id')->constrained('offices')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('division');
            $table->string('gsis_no');
            $table->string('tin_no');
            $table->string('philhealth');
            $table->string('blood_type')->nullable();
            $table->foreignId('detailed_office_id')->constrained('detailed_offices')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('link_token')->unique();
            $table->string('emp_token')->unique();
            $table->string('_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
