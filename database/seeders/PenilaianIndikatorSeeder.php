<?php

namespace Database\Seeders;

use App\Models\PenilaianIndikator;
use Illuminate\Database\Seeder;

class PenilaianIndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Ringkasan',
            'jenis'                 => 1,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Latar Belakang',
            'jenis'                 => 1,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Tinjauan Pustaka',
            'jenis'                 => 1,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Metode',
            'jenis'                 => 1,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Daftar Pustaka',
            'jenis'                 => 1,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Ringkasan',
            'jenis'                 => 2,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Pendahuluan',
            'jenis'                 => 2,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Solusi & Permasalahan',
            'jenis'                 => 2,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Metode Pelaksanaan',
            'jenis'                 => 2,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        
        PenilaianIndikator::insert([
            'penilaian_tahap_id'    => 1,
            'nama'                  => 'Daftar Pustaka',
            'jenis'                 => 2,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
    }
}
