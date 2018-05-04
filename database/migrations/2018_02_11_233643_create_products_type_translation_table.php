<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTypeTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_type_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_type_id')->unsigned();

            $table->string("name")->nullable();
            $table->string('locale')->index();
            $table->string("alias_name", 500)->nullable();
            $table->string("short_description", 1024)->nullable();
            $table->text("description")->nullable();

            $table->unique(['product_type_id','locale']);
            $table->foreign('product_type_id')->references('id')->on('type_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_category_translation');
    }
}
