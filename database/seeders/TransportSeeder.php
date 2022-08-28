<?php

namespace Database\Seeders;

use App\Models\Transports;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transports = collect([
            'Kendaraan Dinas',
            'Kendaraan Pribadi',
            'Travel',
            'Bus',
            'Kereta Api',
            'Kapal Feri',
            'Pesawat'
        ]);

        $transports->each(function ($transport) {
            Transports::create([
                'name' => $transport
            ]);
        });
    }
}
