<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePagesTable.
 */
class CreatePageTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->string('code', 100)->index()->nullable();
            $table->string('group_code', 100)->index()->nullable();
            $table->string('theme', 100)->index();
            $table->tinyInteger('active')->default(0);
            $table->smallInteger('position')->default(0);
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
		Schema::drop('page');
	}
}
