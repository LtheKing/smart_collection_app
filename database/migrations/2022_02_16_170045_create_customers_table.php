<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_customer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('NumberCard');
            $table->string('Bank');
            $table->string('TypeCard');
            $table->string('NameCustomer');
            $table->string('PIC');
            $table->date('AssignmentDate');
            $table->date('ExpireDate');
            $table->date('DateOfBirth');
            $table->date('OpenDate');
            $table->date('WODate');
            $table->date('LastPayDate');
            $table->date('LastTransactionDate');
            $table->string('LastPayment');
            $table->string('LastTransactionNominal');
            $table->string('Limit');
            $table->string('Principal');
            $table->string('MinPay');
            $table->string('OSBalance');
            $table->string('Address1');
            $table->string('Address2');
            $table->string('Address3');
            $table->string('Address4');
            $table->string('City');
            $table->string('OfficeName');
            $table->string('OfficeAddress1');
            $table->string('OfficeAddress2');
            $table->string('OfficeAddress3');
            $table->string('OfficeAddress4');
            $table->string('Phone1');
            $table->string('Phone2');
            $table->string('HomePhone1');
            $table->string('HomePhone2');
            $table->string('OfficePhone1');
            $table->string('OfficePhone2');
            $table->string('ECPhone1');
            $table->string('ECPhone2');
            $table->string('OtherNumber');
            $table->string('ECName');
            $table->string('ECName2');
            $table->string('StatusEC');
            $table->string('StatusEC2');
            $table->string('MotherName');
            $table->string('Sex');
            $table->string('Email');
            $table->string('VirtualAccount');
            $table->string('VirtualAccountName');
            $table->string('Komoditi');
            $table->string('KomoditiType');
            $table->string('Produsen');
            $table->string('Model');
            $table->string('LoanTerm');
            $table->string('InstallmentAlreadyPaid');
            $table->string('MonthlyPaymentNominal');
            $table->string('DPD');
            $table->string('Bucket');
            $table->string('BillingNoPenalty');
            $table->string('DendaBelumDibayar');
            $table->datetime('LastVisitDate');
            $table->string('LastVisitResult');
            $table->string('LastReport');
            $table->string('LastVisitAddress');
            $table->string('OTSOffer');
            $table->string('OtherData1');
            $table->string('OtherData2');
            $table->string('OtherData3');
            $table->string('OtherData4');
            $table->string('OtherData5');
            $table->string('PermanentMessage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_customer');
    }
}
