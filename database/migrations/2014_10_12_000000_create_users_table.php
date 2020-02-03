<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('role')->default(0);
            $table->string('password');
            $table->string('activation_code')->nullable();
            $table->boolean('status')->default(0);
            $table->string('pin')->nullable();
            $table->float('balance',20,8)->default(0);
            $table->string('address');
            $table->string('priv_key');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
