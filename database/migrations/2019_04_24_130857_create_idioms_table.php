<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdiomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idioms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id'); 
            $table->string('idiom', 512);
            $table->integer('start')->default('0');
            $table->integer('stop')->default('0');
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
        Schema::dropIfExists('idioms');
    }
}
