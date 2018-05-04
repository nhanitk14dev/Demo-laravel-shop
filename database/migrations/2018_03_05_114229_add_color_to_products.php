<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->integer("color_id")->nullable();
            $table->integer("size_id")->nullable();
            $table->integer("setting_id")->nullable();
            $table->float('temperature')->nullable(); 
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('color_id');
            $table->dropColumn('size_id');
            $table->dropColumn('setting_id');
            $table->dropColumn('temperature');
        });
    }
}
