<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('slug')->unique();
        $table->text('blog_madia');
        $table->text('blog_madia_en');
        $table->string('title');
        $table->string('title_en');
        $table->text('content');
        $table->text('content_en');
        $table->text('blog_link');
        $table->text('blog_link_en');
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
        Schema::drop('posts');
    }
}
