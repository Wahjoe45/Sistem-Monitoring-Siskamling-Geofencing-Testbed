<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Pengurus 1',
            'username' => 'pengurus1',
            'password' => Hash::make('pengurus123'),
            'no_telepon' => '085792080611',
            'blok' => 'G-11',
            'role' => 'pengurus'
        ]);

        User::create([
            'nama' => 'Warga 1',
            'username' => 'warga1',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222222',
            'blok' => 'G-10',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Budi Santoso',
            'username' => 'warga2',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222223',
            'blok' => 'A-01',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Andi Pratama',
            'username' => 'warga3',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222224',
            'blok' => 'A-02',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Rizky Ramadhan',
            'username' => 'warga4',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222225',
            'blok' => 'A-03',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Dimas Saputra',
            'username' => 'warga5',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222226',
            'blok' => 'A-04',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Agus Setiawan',
            'username' => 'warga6',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222227',
            'blok' => 'B-01',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Fajar Nugraha',
            'username' => 'warga7',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222228',
            'blok' => 'B-02',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Rian Firmansyah',
            'username' => 'warga8',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222229',
            'blok' => 'B-03',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Wahyu Hidayat',
            'username' => 'warga9',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222230',
            'blok' => 'B-04',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Rudi Hartono',
            'username' => 'warga10',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222231',
            'blok' => 'C-01',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Agus Setiawan',
            'username' => 'warga11',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222232',
            'blok' => 'C-02',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Eko Prasetyo',
            'username' => 'warga12',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222233',
            'blok' => 'C-03',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Hendra Wijaya',
            'username' => 'warga13',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222234',
            'blok' => 'C-04',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Arif Kurniawan',
            'username' => 'warga14',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222235',
            'blok' => 'D-01',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Dedi Irawan',
            'username' => 'warga15',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222236',
            'blok' => 'D-02',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Ilham Maulana',
            'username' => 'warga16',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222237',
            'blok' => 'D-03',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Rangga Putra',
            'username' => 'warga17',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222238',
            'blok' => 'D-04',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Teguh Saputro',
            'username' => 'warga18',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222239',
            'blok' => 'E-01',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Bayu Pamungkas',
            'username' => 'warga19',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222240',
            'blok' => 'E-02',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Yoga Pratama',
            'username' => 'warga20',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222241',
            'blok' => 'E-03',
            'role' => 'warga'
        ]);

        User::create([
            'nama' => 'Aditya Firmansyah',
            'username' => 'warga21',
            'password' => Hash::make('warga123'),
            'no_telepon' => '082222222242',
            'blok' => 'E-04',
            'role' => 'warga'
        ]);

    }
}
