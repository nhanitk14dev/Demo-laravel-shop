<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageBlockTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_block_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_block_id')->unsigned();
            $table->string('locale', 20)->index();
            $table->string('photo_translation')->nullable();
            $table->string('url')->nullable();
            $table->string('name')->nullable();
            $table->string('description', 2048)->nullable();
            $table->text('content')->nullable();
            $table->unique(['page_block_id', 'locale']);
            $table->foreign('page_block_id')->references('id')->on('page_block')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_block_translation');
    }
}
