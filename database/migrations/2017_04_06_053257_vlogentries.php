<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vlogentries extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
    Schema::create('vlogentries', function (Blueprint $table) {
        $table->increments('id')->unique;
        $table->string('title');
        $table->string('description');
        $table->string('preperation');
        $table->string('materials');
        $table->string('intro');
        $table->string('main');
        $table->string('outro');
        $table->string('titles');
        $table->string('credits');
        $table->date('filmed');
        $table->date('uploaded');
        $table->date('scheduled');
        $table->string('tags');
        $table->string('links');
        $table->string('sites');
        $table->string('social_media');
        $table->string('series');
        $table->string('no');

    });
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
    Schema::dropIfExists('vlogentries');
}
}
