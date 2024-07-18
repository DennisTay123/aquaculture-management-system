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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('inventory_name');
            $table->text('description')->nullable();
            $table->string('unit_measurement')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            // $table->unsignedInteger('vendor_id');
            // $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
};
