<?php

namespace Database\Seeders;

use App\Models\Locations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = collect([
            'Aceh-Banda Aceh',
            'Aceh-Langsa',
            'Aceh-Lhokseumawe',
            'Aceh-Sabang',
            'Aceh-Subulussalam',
            'Bali-Denpasar',
            'Bangka-Belitung Pangkalpinang',
            'Banten-Cilegon',
            'Banten-Serang',
            'Banten-Tangerang Selatan',
            'Banten-Tangerang',
            'Bengkulu',
            'Yogyakarta',
            'Gorontalo',
            'Jakarta Barat',
            'Jakarta Pusat',
            'Jakarta Selatan',
            'Jakarta Timur',
            'Jakarta Utara',
            'Jambi-Sungai Penuh',
            'Jambi',
            'Jawa Barat-Bandung',
            'Jawa Barat-Bekasi',
            'Jawa Barat-Bogor',
            'Jawa Barat-Cimahi',
            'Jawa Barat-Cirebon',
            'Jawa Barat-Depok',
            'Jawa Barat-Sukabumi',
            'Jawa Barat-Tasikmalaya',
            'Jawa Barat-Banjar',
            'Jawa Tengah-Magelang',
            'Jawa Tengah-Pekalongan',
            'Jawa Tengah-Salatiga',
            'Jawa Tengah-Semarang',
            'Jawa Tengah-Surakarta',
            'Jawa Tengah-Tegal',
            'Jawa Timur-Batu',
            'Jawa Timur-Blitar',
            'Jawa Timur-Kediri',
            'Jawa Timur-Madiun',
            'Jawa Timur-Malang',
            'Jawa Timur-Mojokerto',
            'Jawa Timur-Pasuruan',
            'Jawa Timur-Probolinggo',
            'Jawa Timur-Surabaya',
            'Kalimantan Barat-Pontianak',
            'Kalimantan Barat-Singkawang',
            'Kalimantan Selatan-Banjarbaru',
            'Kalimantan Selatan-Banjarmasin',
            'Kalimantan Tengah-Palangka Raya',
            'Kalimantan Timur-Balikpapan',
            'Kalimantan Timur-Bontang',
            'Kalimantan Timur-Samarinda',
            'Kalimantan Utara-Tarakan',
            'Kepulauan Riau-Batam',
            'Kepulauan Riau-Tanjungpinang',
            'Bandar Lampung',
            'Lampung-Metro',
            'Maluku Utara-Ternate',
            'Maluku Utara-Tidore Kepulauan',
            'Maluku-Ambon',
            'Maluku-Tual',
            'Nusa Tenggara Barat-Bima',
            'Nusa Tenggara Barat-Mataram',
            'Nusa Tenggara Timur-Kupang',
            'Papua Barat-Sorong',
            'Papua-Jayapura',
            'Riau-Dumai',
            'Riau-Pekanbaru',
            'Sulawesi Selatan-Makassar',
            'Sulawesi Selatan-Palopo',
            'Sulawesi Selatan-Parepare',
            'Sulawesi Tengah-Palu',
            'Sulawesi Tenggara-Baubau',
            'Sulawesi Tenggara-Kendari',
            'Sulawesi Utara-Bitung',
            'Sulawesi Utara-Kotamobagu',
            'Sulawesi Utara-Manado',
            'Sulawesi Utara-Tomohon',
            'Sumatra Barat-Bukittinggi',
            'Sumatra Barat-Padang',
            'Sumatra Barat-Padang Panjang',
            'Sumatra Barat-Pariaman',
            'Sumatra Barat-Payakumbuh',
            'Sumatra Barat-Sawahlunto',
            'Sumatra Barat-Solok',
            'Sumatra Selatan-Lubuklinggau',
            'Sumatra Selatan-Pagar Alam',
            'Sumatra Selatan-Palembang',
            'Sumatra Selatan-Prabumulih',
            'Sumatra Utara-Binjai',
            'Sumatra Utara-Gunungsitoli',
            'Sumatra Utara-Medan',
            'Sumatra Utara-Padangsidimpuan',
            'Sumatra Utara-Pematangsiantar',
            'Sumatra Utara-Sibolga',
            'Sumatra Utara-Tanjungbalai',
            'Sumatra Utara-Tebing Tinggi',
        ]);

        $locations->each(function ($location) {
            Locations::create([
                'name' => $location
            ]);
        });
    }
}
