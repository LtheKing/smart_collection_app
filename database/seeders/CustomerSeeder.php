<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 100; $i++){
            DB::table('sm_customer')->insert([
                'NumberCard' => $faker->numerify('#### #### #####'),
                'Bank' => $faker->randomElement([
                    'BCA',
                    'Mandiri',
                    'BRI',
                    'BNI',
                    'Nobu Bank',
                    'OCBC NISP',
                    'DBS',
                    'Maybank'
                ]),
                'TypeCard' => $faker->randomElement([
                    'PLATINUM VISA EMAS',
                    'GOLD VISA', 
                    'CAREFOUR BLUE VISA',
                    'PLATINUM',
                    'GOLD MASTER CARD',
                    'CAREFOUR VISA',
                    'PLATINUM MASTER',
                ]),
                'NameCustomer' => $faker->name,
                'PIC' => '-',
                'AssignmentDate' => $faker->date,
                'ExpireDate' => $faker->date,
                'DateOfBirth' => $faker->date,
                'OpenDate' => $faker->date,
                'WODate' => $faker->date,
                'LastPayDate' => $faker->date,
                'LastPayment' => $faker->numerify('Rp.#.###.###'),
                'LastTransactionDate' => $faker->date,
                'LastTransactionNominal' => $faker->numerify('Rp.#.###.###'),
                'Limit' => $faker->numerify('Rp.#.###.###'),
                'Principal' => $faker->numerify('Rp.#.###.###'),
                'Minpay' => $faker->numerify('Rp.#.###.###'),
                'OSBalance' => $faker->numerify('Rp.#.###.###'),
                'Address1' => $faker->address,
                'Address2' => $faker->address,
                'Address3' => $faker->address,
                'Address4' => $faker->address,
                'City' => $faker->city,
                'OfficeName' => $faker->randomElement([
                    'Office 1',
                    'Office 2',
                    'Office 3',
                    'Office 4',
                    'Office 5',
                ]),
                'OfficeAddress1' => $faker->address,
                'OfficeAddress2' => $faker->address,
                'OfficeAddress3' => $faker->address,
                'OfficeAddress4' => $faker->address,
                'Phone1' => $faker->numerify('08##-####-####'),
                'Phone2' => $faker->numerify('08##-####-####'),
                'HomePhone1' => $faker->numerify('022###-##-##'),
                'HomePhone2' => $faker->numerify('022###-##-##'),
                'OfficePhone1' => $faker->numerify('022###-##-##'),
                'OfficePhone2' => $faker->numerify('022###-##-##'),
                'ECPhone1' => $faker->numerify('08##-####-####'),
                'ECPhone2' => $faker->numerify('08##-####-####'),
                'OtherNumber' => $faker->numerify('08##-####-####'),
                'ECName' => $faker->name,
                'ECName2' => $faker->name,
                'StatusEC' => $faker->randomElement([
                    'BROTHER',
                    'MOTHER',
                    'SON',
                    'FRIEND',
                    'SISTER',
                    'FATHER',
                    'OTHER RELATIVE',
                ]),
                'StatusEC2' => $faker->randomElement([
                'BROTHER',
                    'MOTHER',
                    'SON',
                    'FRIEND',
                    'SISTER',
                    'FATHER',
                    'OTHER RELATIVE',
                ]),
                'MotherName' => $faker->name,
                'Sex' => $faker->randomElement([
                    'MALE',
                    'FEMALE',
                ]),
                'Email' => $faker->email,
                'VirtualAccount' => $faker->numerify('##########'),
                'VirtualAccountName' => $faker->name,
                'Komoditi' => $faker->randomElement([
                    'LEISURE',
                    'Handphone / Smart Phone',
                    'Audio / Video Player',
                    'MEDICAL',
                ]),
                'KomoditiType' => $faker->randomElement([
                    'CAT_MP',
                    'CAT_CD',
                ]),
                'Produsen' => $faker->randomElement([
                    'APPLE',
                    'XIAOMI',
                    'VIVO',
                ]),
                'Model' => $faker->randomElement([
                    'Model 1',
                    'Model 2',
                    'Model 3',
                ]),
                'LoanTerm' => $faker->randomElement([
                    '3',
                    '6',
                    '9',
                    '12',
                ]),
                'InstallmentAlreadyPaid' => $faker->numerify('Rp.#.###.###'),
                'MonthlyPaymentNominal' => $faker->numerify('Rp.#.###.###'),
                'DPD' => $faker->numerify('###'),
                'Bucket' => $faker->randomElement([
                    'M4',
                    'M5',
                    'M6',
                    'M7',
                ]),
                'BillingNoPenalty' => $faker->numerify('Rp.#.###.###'),
                'DendaBelumDibayar' => $faker->numerify('Rp.#.###.###'),
                'LastVisitDate' => $faker->date,
                'LastVisitResult' => $faker->randomElement([
                    'LFCRefuseToPay',
                    'LFChouseLocked',
                    'LFCleftMessage',
                ]),
                'Report' => $faker->randomElement([
                    'Orangnya ga ada',
                    'Marah marah',
                    'diam aja',
                ]),
                'LastReport' => $faker->randomElement([
                    'Orangnya ga ada',
                    'Marah marah',
                    'diam aja',
                ]),
                'LastVisitAddress' => $faker->address,
                'LastReport' => $faker->randomElement([
                    'Yes',
                    'No',
                ]),
                'OTSOffer' => $faker->randomElement([
                    'Yes',
                    'No',
                ]),
                'OtherData1' => $faker->randomElement([
                    'Yes',
                    'No',
                ]),
                'OtherData2' => $faker->randomElement([
                    'Yes',
                    'No',
                ]),
                'OtherData3' => $faker->randomElement([
                    'Yes',
                    'No',
                ]),
                'OtherData4' => $faker->randomElement([
                    'Yes',
                    'No',
                ]),
                'OtherData5' => $faker->randomElement([
                    'Yes',
                    'No',
                ]),
                'PermanentMessage' => $faker->randomElement([
                    'Yes',
                    'No',
                ]),
                'IsDeletedByAdmin' => $faker->randomElement([
                    'No'
                ]),
                'Deskcoll_id' => $faker->randomElement([
                    '6', '73', '74', '75', '76', '77', '79', '80',
                    '81', '82'
                ]),
                'Action' => $faker->randomElement([
                    'Kabur', 'Sembunyi', 'Bayar', 'Menolak'
                ]),
                'ReportDate' => $faker->date,
                'PTPDate' => $faker->date,
                'PTPAmount' => $faker->numerify('Rp.#.###.###'),
                'PaidDate' => $faker->date,
                'PaidAmount' => $faker->numerify('Rp.#.###.###'),
            ]);
        }
    }
}
