<?php

namespace Database\Seeders;

use App\Models\LuaranLuaran;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LuaranLuaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $luaran = [
            'Jurnal ilmiah internasional',
            'Jurnal ilmiah nasional bereputasi',
            'Jurnal ilmiah ber-ISSN',
            'Pemakalah dalam temu ilmiah internasional',
            'Pemakalah dalam temu ilmiah nasional',
            'Pemakalah dalam temu ilmiah lokal',
            'Narasumber dalam temu ilmiah internasional',
            'Narasumber dalam temu ilmiah nasional',
            'Narasumber dalam temu ilmiah lokal',
            'Hak Kekayaan Intelektual (HKI) Paten',
            'Hak Kekayaan Intelektual Paten Sederhana',
            'Hak Kekayaan Intelektual Hak Cipta',
            'Hak Kekayaan Intelektual Merek Dagang',
            'Hak Kekayaan Intelektual Rahasia Dagang',
            'Hak Kekayaan Intelektual Desain Produk Industri',
            'Hak Kekayaan Intelektual Indikasi Geografis',
            'Hak Kekayaan Intelektual Perlindungan Varietas8',
            'Hak Kekayaan Intelektual Tanaman',
            'Hak Kekayaan Intelektual Perlindungan topografi',
            'Hak Kekayaan Intelektual sirkuit terpadu',
            'Teknologi tepat guna',
            'Model/Purwarupa/Desain/Karya seni/ Rekayasa Sosial',
            'Buku ajar (ISBN)'
        ];

        foreach ($luaran as $key => $value) {
            LuaranLuaran::insert([
                'nama'          => $value,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        }
    }
}
