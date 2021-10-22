<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReferenceSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('reference_school')->insert([
          [
              'school_name' => 'SMAN 1 Krayan',
              'address' => 'Jl. Kampung Baru',
              'city' => 'KABUPATEN NUNUKAN',
              'district' => 'KRAYAN',
              'village' => 'LONG BAWAN'
          ]
      ]);
    }
}
