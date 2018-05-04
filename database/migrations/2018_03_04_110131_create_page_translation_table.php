<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('page_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('locale')->index();

            $table->string("title")->nullable();
            $table->string("description", 1024)->nullable();
            $table->string("file")->nullable();
            $table->text('content')->nullable();
            $table->string("slug")->nullable();
            $table->string("path")->nullable();


            $table->unique(['page_id', 'locale']);
            $table->foreign('page_id')->references('id')->on('page')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_translation', function (Blueprint $table) {
            //
        });
    }
}
