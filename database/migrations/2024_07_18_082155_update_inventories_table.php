<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInventoriesTable extends Migration
{
    public function up()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->string('item_code')->before('name');
            $table->renameColumn('inventory_name', 'name');
            $table->renameColumn('unit_measurement', 'um');
            $table->decimal('total_price', 8, 2)->after('price');
            $table->string('brand')->after('total_price');
            $table->unsignedBigInteger('vendor_id')->nullable()->after('brand');
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
    }

    public function down()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->renameColumn('name', 'inventory_name');
            $table->renameColumn('um', 'unit_measurement');
            $table->dropColumn('total_price');
            $table->dropColumn('brand');
            $table->dropColumn('item_code');
            $table->dropForeign(['vendor_id']);
            $table->dropColumn('vendor_id');
        });
    }
}