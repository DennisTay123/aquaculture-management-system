<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpiredAtToRegistrationTokens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the 'expired_at' column to the 'registration_tokens' table
        Schema::table('registration_tokens', function (Blueprint $table) {
            $table->timestamp('expired_at')->nullable()->after('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove the 'expired_at' column from the 'registration_tokens' table
        Schema::table('registration_tokens', function (Blueprint $table) {
            $table->dropColumn('expired_at');
        });
    }
}

