<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSantriPutra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_santri_putra', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('telepon', 20);
            $table->string('email', 50);
            $table->string('alamat', 255);
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
        Schema::dropIfExists('m_santri_putra');
    }
}
