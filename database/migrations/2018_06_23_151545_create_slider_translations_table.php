<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSliderTranslationsTable.
 */
class CreateSliderTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slider_translations', function(Blueprint $table) {
            $table->increments('id');
						$table->integer('slider_id')->unsigned();
            $table->string('locale')->index();
						$table->string('photo_translation')->index();
            $table->string("name")->nullable();
            $table->string("description", 1024)->nullable();
            $table->string("link")->nullable();

            $table->unique(['slider_id','locale']);
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
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
		Schema::drop('slider_translations');
	}
}
