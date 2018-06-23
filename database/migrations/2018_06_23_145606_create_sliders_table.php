<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSlidersTable.
 */
class CreateSlidersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function(Blueprint $table) {
            $table->increments('id');
						$table->string('key', 100)->nullable()->index();
						$table->string('image')->nullable();
						$table->date('expr_from')->nullable();
            $table->date('expr_to')->nullable();
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
		Schema::drop('sliders');
	}
}
