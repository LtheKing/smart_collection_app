<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'sm_customer';
    public $timestamps = false;
    protected $fillable = [
        'NumberCard',
        'Bank',
        'TypeCard',
        'NameCustomer',
        'PIC',
        'AssignmentDate',
        'ExpireDate',
        'DateOfBirth',

        'OpenDate',
        'WODate',
        'LastPayDate',
        'LastPayment',
        'LastTransactionDate',
        'LastTransactionNominal',
        'Limit',
        'Principal',
        'MinPay',

        'OSBalance',
        'Address1',
        'Address2',
        'Address3',
        'Address4',
        'City',
        'OfficeName',
        'OfficeAddress1',
        'OfficeAddress2',
        'OfficeAddress3',
        'OfficeAddress4',

        'Phone1',
        'Phone2',
        'HomePhone1',
        'HomePhone2',
        'OfficePhone1',
        'OfficePhone2',
        'ECPhone1',
        'ECPhone2',
        'OtherNumber',

        'ECName',
        'ECName2',
        'StatusEC',
        'StatusEC2',
        'MotherName',
        'Sex',
        'Email',

        'VirtualAccount',
        'VirtualAccountName',
        'Komoditi',
        'KomoditiType',
        'Produsen',
        'Model',
        'LoanTerm',
        'InstallmentAlreadyPaid',
        'MonthlyPaymentNominal',

        'DPD',
        'Bucket',
        'BillingNoPenalty',
        'DendaBelumDibayar',
        'LastVisitDate',
        'LastVisitResult',
        'LastReport',
        'LastVisitAddress',
        'OTSOffer',
        
        'OtherData1',
        'OtherData2',
        'OtherData3',
        'OtherData4',
        'OtherData5',
        'PermanentMessage'
    ];
}
