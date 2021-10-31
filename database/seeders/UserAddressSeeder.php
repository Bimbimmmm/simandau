<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('user_address')->insert([
          [
              'address' => 'Nusa Tamalanrea Indah Blok QE.5',
              'province' => 'SULAWESI SELATAN',
              'city' => 'KOTA MAKASSAR',
              'district' => 'TAMALANREA',
              'village' => 'KAPASA',
              'zip_code' => '90241',
              'is_deleted' => FALSE,
              'user_id' => 8
          ]
      ]);
    }
}
