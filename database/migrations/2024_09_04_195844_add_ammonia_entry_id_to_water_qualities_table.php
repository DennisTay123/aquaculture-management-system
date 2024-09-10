<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('water_qualities', function (Blueprint $table) {
            $table->bigInteger('ammonia_entry_id')->unsigned()->nullable(); // Add the new column
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('water_qualities', function (Blueprint $table) {
            $table->dropColumn('ammonia_entry_id');
        });
    }

};
