<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilosopiImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filosopi_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tampilan_id')->nullable();
            $table->string('image');
            $table->string('bagian');
            $table->timestamps();
        });

        Schema::table('filosopi_image', function(Blueprint $table){
            $table->foreign('tampilan_id')
                  ->references('id')
                  ->on('tampilan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filosopi_image');
    }
}
