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
        $default = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        User::create(array_merge([
            'name' => 'admin',
            'nip' => '123',
            'email' => 'admin@gmail.com',
            'image' => null,
            'jenis_kelamin' => 'L',
        ], $default));
        User::create(array_merge([
            'name' => 'Jaenal Mustakim',
            'nip' => '1855201369',
            'email' => 'jaenal@gmail.com',
            'image' => null,
            'jenis_kelamin' => 'L',
        ], $default));
        User::create(array_merge([
            'name' => 'Andi Burhanuddin',
            'nip' => '1855201111',
            'email' => 'andi@gmail.com',
            'image' => null,
            'jenis_kelamin' => 'L',
        ], $default));
        User::create(array_merge([
            'name' => 'Muhammad Iqbal Rashid',
            'nip' => '1855201112',
            'email' => 'miqbal@gmail.com',
            'image' => null,
            'jenis_kelamin' => 'L',
        ], $default));
        User::create(array_merge([
            'name' => 'Muhammad Wahyudin',
            'nip' => '1855201113',
            'email' => 'mwahyudin@gmail.com',
            'image' => null,
            'jenis_kelamin' => 'L',
        ], $default));
    }
}
