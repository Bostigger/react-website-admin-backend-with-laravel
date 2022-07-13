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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('course_title');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('course_thumbnail');
            $table->string('course_image');
            $table->text('long_title');
            $table->string('students_number');
            $table->string('duration');
            $table->string('lectures_number');
            $table->string('categories');
            $table->string('tags');
            $table->string('instructor');
            $table->string('course_price');
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
        Schema::dropIfExists('courses');
    }
};
