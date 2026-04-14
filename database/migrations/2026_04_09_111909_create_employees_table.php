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
            $table->dateTime('date_for_employment')->nullable();
            $table->dateTime('pagibig_date_from')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->text('address')->nullable();
            $table->string('telephone_no')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('department_code')->nullable();
            $table->string('department_desc')->nullable();
            $table->string('employee_code')->nullable()->unique();
            $table->string('company_code')->nullable();
            $table->string('sss')->nullable();
            $table->string('tin')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('atm_no')->nullable();
            $table->decimal('basic_salary', 15, 2)->nullable();
            $table->string('tax_code')->nullable();
            $table->string('religion')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('position')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('type_of_payment')->nullable();
            $table->boolean('active')->default(true);
            $table->string('location')->nullable();
            $table->string('nickname')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('voting_location')->nullable();
            $table->string('talent')->nullable();
            $table->string('prefered_sex')->nullable();
            $table->dateTime('fiesta_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
