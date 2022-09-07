<?php

namespace Database\Seeders;

use App\Models\KodeRekening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodeRekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kode_rekenings = collect([
            '4.02.01.2.06.09',
            '5.1.02.04.01.0001',
        ]);

        $kode_rekenings->each(function ($kode_rekening) {
            KodeRekening::create([
                'kode_rekening' => $kode_rekening
            ]);
        });
    }
}
