<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sm_customer', function (Blueprint $table) {
            $table->text('Action', 255)->nullable();
            $table->text('ReportDate', 75)->nullable();
            $table->text('PTPDate', 75)->nullable();
            $table->text('PTPAmount', 25)->nullable();
            $table->text('PaidDate', 75)->nullable();
            $table->text('PaidAmount', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
