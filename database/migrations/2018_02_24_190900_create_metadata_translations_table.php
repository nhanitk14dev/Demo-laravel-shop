<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadataTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadata_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metadata_id')->unsigned();
             $table->string('locale')->index();

            $table->string("title")->nullable();
            $table->string("description", 1024)->nullable();
            $table->string("key_word", 1024)->nullable();

            $table->unique(['metadata_id','locale']);
            $table->foreign('metadata_id')->references('id')->on('metadata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('metadata_translations', function (Blueprint $table) {
            //
        });
    }
}
