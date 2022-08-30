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
            '600000',
            '1000000',
            '1200000',
            '1500000',
            '1800000',
            '2000000',
            '2500000'
        ]);

        $anggarans->each(function ($anggaran) {
            Anggaran::create([
                'nominal' => $anggaran
            ]);
        });
    }
}
