<?php

namespace Database\Seeders;

use App\Models\RabJenis;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RabJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RabJenis::insert([
            'nama'          => 'HONOR OUTPUT KEGIATAN',
            'deskripsi'     => 'Honorarium pelaksana non dosen',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
            
        RabJenis::insert([
            'nama'          => 'BELANJA BARANG NON OPERASIONAL LAINNYA',
            'deskripsi'     => 'Penginapan/hotel',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
            
        RabJenis::insert([
            'nama'          => 'BELANJA BAHAN',
            'deskripsi'     => 'ATK, bahan habis pakai, surat menyurat, foto kopi, penggandaan, dokumentasi, dan pelaporan',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        RabJenis::insert([
            'nama'          => 'BELANJA PERJALANAN LAINNYA',
            'deskripsi'     => 'Perjalanan/transportasi',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        RabJenis::insert([
            'nama'          => 'BELANJA PERALATAN PENUNJANG',
            'deskripsi'     => 'Paket data internet, pembelian lisensi perangkat lunak',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        RabJenis::insert([
            'nama'          => 'LAIN-LAIN',
            'deskripsi'     => 'Publikasi, dokumentasi, penyusunan laporan, dll',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
