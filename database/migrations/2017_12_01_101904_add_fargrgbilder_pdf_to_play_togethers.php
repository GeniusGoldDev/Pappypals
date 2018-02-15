<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFargrgbilderPdfToPlayTogethers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('play_togethers', function (Blueprint $table) {
            $table->text('fargrgbilder_pdf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('play_togethers', function (Blueprint $table) {
            //
        });
    }
}
