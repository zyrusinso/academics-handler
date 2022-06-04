<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('certificate');
            $table->string('life_programs');
            $table->string('affordability');
            $table->string('social');

            $table->string('education_services');
            $table->string('education_services_link');
            $table->string('success_rate');
            $table->string('success_rate_link');
            $table->string('foreign_student');
            $table->string('foreign_student_link');

            $table->string('tour_about_title');
            $table->string('tour_title');
            $table->string('tour_description');
            $table->string('list_one');
            $table->string('list_two');
            $table->string('list_three');
            $table->string('tour_image');
            $table->string('tour_link');
            
            $table->string('started_title');
            $table->string('started_description');
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
        Schema::dropIfExists('abouts');
    }
}
