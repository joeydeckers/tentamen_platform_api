<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_name');
            $table->string('course_school');
            $table->string('course_school_url');
            $table->string('course_study');
            $table->integer('course_year');
            $table->text('course_description');
            $table->string('course_time_summary')->nullable();
            $table->string('course_video_url')->nullable();
            $table->string('course_powerpoint_url')->nullable();
            $table->string('course_audio_url')->nullable();
            $table->string('course_summary_url')->nullable();
            $table->integer('course_uploader_id');
            
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
}
