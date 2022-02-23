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
                'PIC' => $faker->name,
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
            ]);
        }
    }
}
