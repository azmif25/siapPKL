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
            $table->increments('id');
            $table->string('nomor_induk')->nullable();
            $table->unsignedinteger('roles_id')->nullable();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table){
            $table->increments('id');
            $table->string('rolename');
        });

        Schema::table('users', function(Blueprint $kolom){
            $kolom->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('nomor_induk')->references('nomor_induk')->on('t_peserta_magang')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('roles');
    }
}
