<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolleds', function (Blueprint $table) {
            $table->bigIncrements('EnrolledID')->unsigned();
            $table->bigInteger('InstructorID')->unsigned();
            $table->bigInteger('StudentID')->unsigned();
            $table->bigInteger('CourseID')->unsigned();
            $table->foreign('CourseID')->references('CourseID')->on('courses');
            $table->foreign('StudentID')->references('StudentID')->on('students');
            $table->foreign('InstructorID')->references('InstructorID')->on('instructors');
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
        Schema::dropIfExists('enrolleds');
    }
}
