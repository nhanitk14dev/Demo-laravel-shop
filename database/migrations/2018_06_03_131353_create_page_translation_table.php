<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePageTranslationsTable.
 */
class CreatePageTranslationTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_translation', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('description', 1024)->nullable();
            $table->text('content')->nullable();
            $table->string('slug')->nullable();
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
		Schema::drop('page_translation');
	}
}
