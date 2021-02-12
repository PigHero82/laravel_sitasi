<?php

namespace Database\Seeders;

use App\Models\PenilaianTahap;
use Illuminate\Database\Seeder;

class PenilaianTahapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PenilaianTahap::insert([
            'nama'          => 'Usulan',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        PenilaianTahap::insert([
            'nama'          => 'MONEV',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        PenilaianTahap::insert([
            'nama'          => 'Hasil',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
