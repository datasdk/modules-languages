<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    public function up()
    {

        if(!Schema::hasTable("languages"))
        Schema::create('languages', function (Blueprint $table) {

		$table->increments('id');
		$table->string('name')->nullable();
		$table->string('shortname')->nullable();
		$table->boolean('primary')->default(0);
		$table->boolean('active')->default(1);
		$table->foreignID('country_id')->default(0);
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
}