<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_supervisor', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('NoTelepon');
            $table->string('Alamat');
            $table->string('Email');
            $table->string('NIP');
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
        Schema::dropIfExists('sm_supervisor');
    }
}
