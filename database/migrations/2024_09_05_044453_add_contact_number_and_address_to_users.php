<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactNumberAndAddressToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add 'contact_number' and 'address' columns to 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->string('contact_number', 15)->nullable()->after('email');
            $table->text('address')->nullable()->after('contact_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove 'contact_number' and 'address' columns from 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('contact_number');
            $table->dropColumn('address');
        });
    }
}

