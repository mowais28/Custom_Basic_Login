<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_accounts', function (Blueprint $table) {
            $table->id();
            $table->string("user_name");
            $table->string("email_address")->unique();
            $table->string("phone");
            $table->string("password");
            $table->string("account_role");
            $table->string("profile_pic")->nullable();
            $table->boolean("account_status");
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
        Schema::dropIfExists('app_accounts');
    }
};
