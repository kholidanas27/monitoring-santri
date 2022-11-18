<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 100);
            $table->string('email', 50);
            $table->string('password_hash', 255);
            $table->string('password_salt', 255);
            $table->string('name_front', 255);
            $table->string('name_middle_last', 255);
            $table->boolean('is_deleted', false);
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
        Schema::dropIfExists('m_users');
    }
}
