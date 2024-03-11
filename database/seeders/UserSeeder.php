<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->nama = "Admin";
        $user->username = "admin";
        $user->password = '123456';
        $user->role = 'Admin';
        $user->tanggal_lahir = '2002-08-15';
        $user->jenis_kelamin = 'Laki-Laki';
        $user->save();

        $user = new User;
        $user->nama = "Kepala Marketing";
        $user->username = "kepalamarketing";
        $user->password = '123456';
        $user->role = 'Kepala Marketing';
        $user->tanggal_lahir = '2002-08-15';
        $user->jenis_kelamin = 'Laki-Laki';
        $user->save();

        $user = new User;
        $user->nama = "Divisi Marketing";
        $user->username = "divisimarketing";
        $user->password = '123456';
        $user->role = 'Divisi Marketing';
        $user->tanggal_lahir = '2002-08-15';
        $user->jenis_kelamin = 'Laki-Laki';
        $user->save();
    }
}
