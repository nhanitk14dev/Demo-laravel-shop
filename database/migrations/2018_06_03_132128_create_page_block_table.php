<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePageBlocksTable.
 */
class CreatePageBlockTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_block', function(Blueprint $table) {
            $table->increments('id');
	        $table->integer('page_id')->unsigned();
	        $table->integer('parent_id')->default(0);
	        $table->string('code')->index();
	        $table->string('types')->index();// ICON, PHOTO, PHOTOS, NAME, DESCRIPTION, CONTENT, IMAGE_MAP
	        $table->string('icon')->nullable();
	        $table->string('photo')->nullable();
	        $table->integer('image_map_id')->nullable();
	        $table->smallInteger('position')->default(0);
	        $table->timestamps();
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
		Schema::drop('page_blocks');
	}
}
