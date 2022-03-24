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
        return new Customer([
            'NumberCard'                    => $row['NumberCard'],
            'Bank'                          => $row['Bank'],
            'TypeCard'                      => $row['TypeCard'],
            'NameCustomer'                  => $row['NameCustomer'],
            'PIC'                           => $row['PIC'],
            'AssignmentDate'                => $row['AssignmentDate'],
            'ExpireDate'                    => $row['ExpireDate'],
            'DateOfBirth'                   => $row['DateOfBirth'],

            'OpenDate'                      => $row['OpenDate'],
            'WODate'                        => $row['WODate'],
            'LastPayDate'                   => $row['LastPayDate'],
            'LastPayment'                   => $row['LastPayment'],
            'LastTransactionDate'           => $row['LastTransactionDate'],
            'LastTransactionNominal'        => $row['LastTransactionNominal'],
            'Limit'                         => $row['Limit'],
            'Principal'                     => $row['Principal'],
            'MinPay'                        => $row['MinPay'],

            'OSBalance'                     => $row['OSBalance'],
            'Address1'                      => $row['Address1'],
            'Address2'                      => $row['Address2'],
            'Address3'                      => $row['Address3'],
            'Address4'                      => $row['Address4'],
            'City'                          => $row['City'],
            'OfficeName'                    => $row['OfficeName'],
            'OfficeAddress1'                => $row['OfficeAddress1'],
            'OfficeAddress2'                => $row['OfficeAddress2'],
            'OfficeAddress3'                => $row['OfficeAddress3'],
            'OfficeAddress4'                => $row['OfficeAddress4'],

            'Phone1'                        => $row['Phone1'],
            'Phone2'                        => $row['Phone2'],
            'HomePhone1'                    => $row['HomePhone1'],
            'HomePhone2'                    => $row['HomePhone2'],
            'OfficePhone1'                  => $row['OfficePhone1'],
            'OfficePhone2'                  => $row['OfficePhone2'],
            'ECPhone1'                      => $row['ECPhone1'],
            'ECPhone2'                      => $row['ECPhone2'],
            'OtherNumber'                   => $row['OtherNumber'],

            'ECName'                        => $row['ECName'],
            'ECName2'                       => $row['ECName2'],
            'StatusEC'                      => $row['StatusEC'],
            'StatusEC2'                     => $row['StatusEC2'],
            'MotherName'                    => $row['MotherName'],
            'Sex'                           => $row['Sex'],
            'Email'                         => $row['Email'],

            'VirtualAccount'                => $row['VirtualAccount'],
            'VirtualAccountName'            => $row['VirtualAccountName'],
            'Komoditi'                      => $row['Komoditi'],
            'KomoditiType'                  => $row['KomoditiType'],
            'Produsen'                      => $row['Produsen'],
            'Model'                         => $row['Model'],
            'LoanTerm'                      => $row['LoanTerm'],
            'InstallmentAlreadyPaid'        => $row['InstallmentAlreadyPaid'],
            'MonthlyPaymentNominal'         => $row['MonthlyPaymentNominal'],

            'DPD'                           => $row['DPD'],
            'Bucket'                        => $row['Bucket'],
            'BillingNoPenalty'              => $row['BillingNoPenalty'],
            'DendaBelumDibayar'             => $row['DendaBelumDibayar'],
            'LastVisitDate'                 => $row['LastVisitDate'],
            'LastVisitResult'               => $row['LastVisitResult'],
            'Report'                        => $row['Report'],
            'LastReport'                    => $row['LastReport'],
            'LastVisitAddress'              => $row['LastVisitAddress'],
            'OTSOffer'                      => $row['OTSOffer'],
            
            'OtherData1'                    => $row['OtherData1'],
            'OtherData2'                    => $row['OtherData2'],
            'OtherData3'                    => $row['OtherData3'],
            'OtherData4'                    => $row['OtherData4'],
            'OtherData5'                    => $row['OtherData5'],
            'PermanentMessage'              => $row['PermanentMessage'],

            'IsDeletedByAdmin'              => $row['IsDeletedByAdmin'],
            'Deskcoll_id'                   => $row['Deskcoll_id'],
        ]);
    }
}
