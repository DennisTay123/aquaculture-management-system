<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationTokensTable extends Migration
{
    public function up()
    {
        Schema::create('registration_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('token')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registration_tokens');
    }
}
