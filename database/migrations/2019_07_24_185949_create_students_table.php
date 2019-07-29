<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('StudentID');
            $table->string('StudentFirstName');
            $table->string('StudentLastName');
            $table->string('StudentEmail')->unique();
            $table->string('StudentPhoneNumber')->unique();
            $table->string('HomeState');
            $table->date('BirthDate')->default('1901-01-01');
            $table->string('Gender');
            $table->integer('TotalCreditHours')->default(3);
            $table->float('GPA')->default(2.5);
            $table->string('SemesterEnrolled');
            $table->bigInteger('Program')->unsigned();
            $table->foreign('Program')->references('ProgramID')->on('programs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
