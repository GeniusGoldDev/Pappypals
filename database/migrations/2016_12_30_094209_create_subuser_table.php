<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubuserTable extends Migration
{
    /**
     * Run the migrations for admins users.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subuser', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('username');
            $table->string('birthdate');
            $table->text('userimage');
            $table->timestamps();
        });
        Schema::table('subuser', function($table) {
       $table->foreign('user_id')->references('id')->on('users');
   });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subuser');
    }
}
