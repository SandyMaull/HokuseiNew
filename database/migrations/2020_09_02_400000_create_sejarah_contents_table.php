<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSejarahContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sejarah_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tampilan_id')->nullable();
            $table->text('content');
            $table->string('bagian');
            $table->timestamps();
        });

        Schema::table('sejarah_contents', function(Blueprint $table){
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
        Schema::dropIfExists('sejarah_contents');
    }
}
