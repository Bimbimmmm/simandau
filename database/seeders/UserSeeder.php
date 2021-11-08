<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('users')->insert([
          [
              'first_name' => 'Admin',
              'last_name' => 'Cabdin Nunukan',
              'id_number' => '197010102003122006',
              'email' => 'admincabdin@simandau.kaltaraprov.go.id',
              'password' => Hash::make('@dm1nSimand4u'),
              'is_admin' => TRUE,
              'is_operator' => FALSE,
              'is_guest' => FALSE,
              'mac_address' => 'XXXXXXXX',
              'ip_address' => 'XXXXXXXX',
              'avatar_file' => 'admin.jpg',
              'is_deleted' => FALSE
          ]
      ]);
    }
}
