<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Customer([
            'NumberCard'                    => $row['numbercard'],
            'Bank'                          => $row['bank'],
            'TypeCard'                      => $row['typecard'],
            'NameCustomer'                  => $row['namecustomer'],
            'PIC'                           => $row['pic'],
            'AssignmentDate'                => $row['assignmentdate'],
            'ExpireDate'                    => $row['expiredate'],
            'DateOfBirth'                   => $row['dateofbirth'],

            'OpenDate'                      => $row['opendate'],
            'WODate'                        => $row['wodate'],
            'LastPayDate'                   => $row['lastpaydate'],
            'LastPayment'                   => $row['lastpayment'],
            'LastTransactionDate'           => $row['lasttransactiondate'],
            'LastTransactionNominal'        => $row['lasttransactionnominal'],
            'Limit'                         => $row['limit'],
            'Principal'                     => $row['principal'],
            'MinPay'                        => $row['minpay'],

            'OSBalance'                     => $row['osbalance'],
            'Address1'                      => $row['address1'],
            'Address2'                      => $row['address2'],
            'Address3'                      => $row['address3'],
            'Address4'                      => $row['address4'],
            'City'                          => $row['city'],
            'OfficeName'                    => $row['officename'],
            'OfficeAddress1'                => $row['officeaddress1'],
            'OfficeAddress2'                => $row['officeaddress2'],
            'OfficeAddress3'                => $row['officeaddress3'],
            'OfficeAddress4'                => $row['officeaddress4'],

            'Phone1'                        => $row['phone1'],
            'Phone2'                        => $row['phone2'],
            'HomePhone1'                    => $row['homephone1'],
            'HomePhone2'                    => $row['homephone2'],
            'OfficePhone1'                  => $row['officephone1'],
            'OfficePhone2'                  => $row['officephone2'],
            'ECPhone1'                      => $row['ecphone1'],
            'ECPhone2'                      => $row['ecphone2'],
            'OtherNumber'                   => $row['othernumber'],

            'ECName'                        => $row['ecname'],
            'ECName2'                       => $row['ecname2'],
            'StatusEC'                      => $row['statusec'],
            'StatusEC2'                     => $row['statusec2'],
            'MotherName'                    => $row['mothername'],
            'Sex'                           => $row['sex'],
            'Email'                         => $row['email'],

            'VirtualAccount'                => $row['virtualaccount'],
            'VirtualAccountName'            => $row['virtualaccountname'],
            'Komoditi'                      => $row['komoditi'],
            'KomoditiType'                  => $row['komodititype'],
            'Produsen'                      => $row['produsen'],
            'Model'                         => $row['model'],
            'LoanTerm'                      => $row['loanterm'],
            'InstallmentAlreadyPaid'        => $row['installmentalreadypaid'],
            'MonthlyPaymentNominal'         => $row['monthlypaymentnominal'],

            'DPD'                           => $row['dpd'],
            'Bucket'                        => $row['bucket'],
            'BillingNoPenalty'              => $row['billingnopenalty'],
            'DendaBelumDibayar'             => $row['dendabelumdibayar'],
            'LastVisitDate'                 => $row['lastvisitdate'],
            'LastVisitResult'               => $row['lastvisitresult'],
            'Report'                        => $row['report'],
            'LastReport'                    => $row['lastreport'],
            'LastVisitAddress'              => $row['lastvisitaddress'],
            'OTSOffer'                      => $row['otsoffer'],
            
            'OtherData1'                    => $row['otherdata1'],
            'OtherData2'                    => $row['otherdata2'],
            'OtherData3'                    => $row['otherdata3'],
            'OtherData4'                    => $row['otherdata4'],
            'OtherData5'                    => $row['otherdata5'],
            'PermanentMessage'              => $row['permanentmessage'],

            'IsDeletedByAdmin'              => $row['isdeletedbyadmin'],
            'Deskcoll_id'                   => $row['deskcoll_id'],
        ]);
    }
}
