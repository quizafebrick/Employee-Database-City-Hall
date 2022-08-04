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
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('offices')->onUpdate('cascade')->onDelete('cascade');
            $table->string('division');
            $table->string('gsis_no');
            $table->string('tin_no');
            $table->string('philhealth');
            $table->string('blood_type')->nullable();
            $table->unsignedBigInteger('detailed_office_id');
            $table->foreign('detailed_office_id')->references('id')->on('detailed_offices')->onUpdate('cascade')->onDelete('cascade');
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
