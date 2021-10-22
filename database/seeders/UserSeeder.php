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
              'last_name' => 'Cabdin',
              'id_number' => '7371121305980005',
              'email' => 'bimasatriayudha1398@gmail.com',
              'password' => Hash::make('namamuji'),
              'is_admin' => TRUE,
              'is_operator' => FALSE,
              'is_guest' => FALSE,
              'mac_address' => 'XXXXXXXX',
              'ip_address' => 'XXXXXXXX',
              'avatar_file' => 'admin.jpg',
              'is_deleted' => FALSE
          ],
          [
              'first_name' => 'Dewi',
              'last_name' => 'Ayu',
              'id_number' => '1234567890',
              'email' => 'dwayina@gmail.com',
              'password' => Hash::make('namamuji'),
              'is_admin' => FALSE,
              'is_operator' => FALSE,
              'is_guest' => TRUE,
              'mac_address' => 'XXXXXXXX',
              'ip_address' => 'XXXXXXXX',
              'avatar_file' => 'dwayina.jpg',
              'is_deleted' => FALSE
          ]
      ]);
    }
}
