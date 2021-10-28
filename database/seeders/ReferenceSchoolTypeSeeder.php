<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReferenceSchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('reference_school_type')->insert([
          [
            'type' => 'Taman Kanak-Kanak / PAUD',
            'is_province' => FALSE
          ],
          [
            'type' => 'Sekolah Dasar',
            'is_province' => FALSE
          ],
          [
            'type' => 'Sekolah Menengah Pertama',
            'is_province' => FALSE
          ],
          [
              'type' => 'Sekolah Menengah Atas',
              'is_province' => TRUE
          ],
          [
              'type' => 'Sekolah Menengah Kejuruan',
              'is_province' => TRUE
          ],
          [
              'type' => 'Sekolah Luar Biasa',
              'is_province' => TRUE
          ]
      ]);
    }
}
