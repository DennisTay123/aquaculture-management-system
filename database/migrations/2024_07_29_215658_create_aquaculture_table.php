<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAquacultureTable extends Migration
{
    public function up()
    {
        Schema::create('aquaculture', function (Blueprint $table) {
            $table->id();
            $table->integer('entry_id')->unique();
            $table->decimal('field1', 10, 5)->nullable();
            $table->decimal('field2', 10, 5)->nullable();
            $table->decimal('field3', 10, 5)->nullable();
            $table->decimal('field4', 10, 5)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aquaculture');
    }
}
