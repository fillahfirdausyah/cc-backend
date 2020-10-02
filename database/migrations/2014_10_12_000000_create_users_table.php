<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('username')->default('user'. time());
            $table->string('email')->unique();
            $table->text('bio')->nullable();
            $table->string('pekerjaan')->default('-');
            $table->string('alamat')->default('-');
            $table->string('hobi')->default('-');
            $table->string('foto_profile')->default('/image/Member/Profile/profile.png');
            $table->string('foto_sampul')->default('/image/Member/Profile/sampul.jpeg');
            $table->string('role')->default('member');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
