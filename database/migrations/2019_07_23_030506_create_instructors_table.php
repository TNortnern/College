<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('InstructorID')->unsigned();
            $table->string('InstructorFirstname');
            $table->string('InstructorLastname');
            $table->string('InstructorEmail')->unique();
            $table->string('InstructorPhone')->unique();
            $table->string('DegreeEarned');
            $table->string('DegreeSchool');
            $table->text('Description');
            $table->boolean('Admin')->default(0);
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
        Schema::dropIfExists('instructors');
    }
}
