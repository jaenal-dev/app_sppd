<?php

namespace Database\Seeders;

use App\Models\Anggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggarans = collect([
            '100000',
            '200000',
            '300000',
            '400000',
            '500000',
            '600000',
            '700000',
            '800000',
            '900000',
            '1000000',
        ]);

        $anggarans->each(function ($anggaran) {
            Anggaran::create([
                'nominal' => $anggaran
            ]);
        });
    }
}
