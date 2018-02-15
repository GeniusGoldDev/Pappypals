<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->increments('id');
            $table->text('madia');
            $table->text('madia_en');
            $table->string('title')->default('Ingen title angiven'); 
            $table->string('title_en')->default('No title given'); 
            $table->text('content');
            $table->text('content_en');
            $table->string('first_unit_title');
            $table->string('first_unit_title_en');
            $table->text('first_unit_content');
            $table->text('first_unit_content_en');
            $table->string('second_unit_title');
            $table->string('second_unit_title_en');
            $table->text('second_unit_content');
            $table->text('second_unit_content_en');
            $table->string('third_unit_title');
            $table->string('third_unit_title_en');
            $table->text('third_unit_content');
            $table->text('third_unit_content_en');
            $table->text('fourth_unit_title_en');
            $table->text('fourth_unit_content_en');
            $table->text('fargbilder_pdf')->nullable();
            $table->text('fargbilder_pdf_en')->nullable();
            $table->text('fragor_pdf')->nullable();
            $table->text('fragor_pdf_en')->nullable();
            $table->text('diplom_pdf')->nullable();
            $table->text('diplom_pdf_en')->nullable();
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
        Schema::drop('activites');
    }
}
