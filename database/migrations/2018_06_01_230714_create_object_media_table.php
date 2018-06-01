<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_media', function (Blueprint $table) {
            $table->string('type', 50)->index();
            $table->integer('object_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->smallInteger("position")->default(0);
            $table->integer('level')->default(0);
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_media');
    }
}
