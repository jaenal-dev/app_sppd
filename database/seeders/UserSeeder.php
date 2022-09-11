<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'nip' => '1234567890',
            'role' => 1,
            'image' => null,
            'jenis_kelamin' => 'L',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name' => 'Sekertaris Dewan',
            'nip' => '0987654321',
            'image' => null,
            'role' => 2,
            'jenis_kelamin' => 'L',
            'pangkat' => 'Pembina Tingkat Muda',
            'golongan' => 'IV/c',
            'esselon' => 'III.a',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name' => 'Jaenal Mustakim',
            'nip' => '1855201369',
            'image' => null,
            'role' => 3,
            'jenis_kelamin' => 'L',
            'pangkat' => 'Pembina Tingkat I',
            'golongan' => 'IV/a',
            'esselon' => 'III.a',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name' => 'Andi Burhanuddin',
            'nip' => '1855201111',
            'image' => null,
            'role' => 3,
            'jenis_kelamin' => 'L',
            'pangkat' => 'Pembina Tingkat II',
            'golongan' => 'IV/b',
            'esselon' => 'III.b',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name' => 'Muhammad Iqbal Rashid',
            'nip' => '1855201112',
            'image' => null,
            'role' => 3,
            'jenis_kelamin' => 'L',
            'pangkat' => 'Pembina Tingkat II',
            'golongan' => 'IV/b',
            'esselon' => 'III.b',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name' => 'Muhammad Wahyudin',
            'nip' => '1855201113',
            'role' => 3,
            'image' => null,
            'jenis_kelamin' => 'L',
            'pangkat' => 'Pembina Tingkat I',
            'golongan' => 'IV/c',
            'esselon' => 'III.c',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
