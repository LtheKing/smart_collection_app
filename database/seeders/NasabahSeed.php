<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;


class NasabahSeed extends Seeder
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
            // insert data ke table sm_nasabah menggunakan Faker
            DB::table('sm_nasabah')->insert([
                'Nama' => $faker->name,
                'NoRekening' => $faker->numerify('#### #### #####'),
                'NIK' => $faker->numerify('#### #### #### ####'),
                'NoTelepon' => $faker->numerify('08##-####-####'),
                'Alamat' => $faker->address,
                'Email' => $faker->email,
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
            ]);
        }
    }
}
