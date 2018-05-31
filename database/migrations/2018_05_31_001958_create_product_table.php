<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("producer_id")->nullable();
            $table->string("unit_price", 500)->nullable();
            $table->string("promotion_price", 500)->nullable();
            $table->string("image")->nullable();//hinh dai dien
            $table->string("note", 1024)->nullable();
            $table->tinyInteger("active")->default(1);
            $table->tinyInteger("is_new")->default(0);
            $table->smallInteger("rating")->default(0);
            $table->string("unit")->nullable();
            $table->string("status", 20)->index()->default("publishing");
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
        Schema::dropIfExists('product');
    }
}
