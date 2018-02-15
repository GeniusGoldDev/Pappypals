<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayTogethersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // PlayTogethers migrate
        // PlayTogethers make:modle 
        // PlayTogethercontroller
        // Route::resource('playTogether', 'PlayTogethercontroller');
        Schema::create('play_togethers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique(); 
            $table->text('description_title');
            $table->text('description_title_en');
            $table->text('description');
            $table->text('description_en');
            $table->text('small_madia');
            $table->text('small_madia_en');
            $table->string('unit_1_title');
            $table->string('unit_1_title_en');
            $table->text('madia'); 
            $table->text('madia_en'); 
            $table->string('unit_2_title');
            $table->string('unit_2_title_en');
            $table->text('unit_2_description');
            $table->text('unit_2_description_en');
            $table->string('unit_3_title');
            $table->string('unit_3_title_en');
            $table->text('unit_3_description');
            $table->text('unit_3_description_en');
            $table->string('title')->default('No title given');
            $table->string('title_en')->default('No title given');
            $table->text('content_1');
            $table->text('content_1_en');
            $table->text('content_2');
            $table->text('content_2_en');
            $table->text('content_3');
            $table->text('content_3_en');
            $table->text('content_4');
            $table->text('content_4_en');
            $table->text('content_5');
            $table->text('content_5_en');
            $table->text('content_6');
            $table->text('content_6_en');
            $table->text('content_7');
            $table->text('content_7_en');
            $table->text('content_8');
            $table->text('content_8_en');
            $table->text('content_9');
            $table->text('content_9_en');
            $table->text('content_10');
            $table->text('content_10_en');
            $table->integer('steg')->default(0);
            $table->text('Taggs');
            $table->text('Taggs_en');
            $table->text('fargrgbilder_pdf_en')->nullable();;
            $table->text('fragor_pdf_en')->nullable();;
            $table->text('diplom_pdf_en')->nullable();;
            $table->timestamps();
            $table->timestamp('published_at')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('play_togethers');
    }
}
