<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_nasabah', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('NoRekening');
            $table->string('NIK');
            $table->string('NoTelepon');
            $table->string('Alamat');
            $table->string('Email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_nasabah');
    }
}
