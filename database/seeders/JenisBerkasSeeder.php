<?php

namespace Database\Seeders;

use App\Models\JenisBerkas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JenisBerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisBerkas::insert([
            'nama'          => 'Proposal',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        JenisBerkas::insert([
            'nama'          => 'Laporan Kemajuan',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        JenisBerkas::insert([
            'nama'          => 'Laporan Akhir',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        JenisBerkas::insert([
            'nama'          => 'Laporan Anggaran',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        JenisBerkas::insert([
            'nama'          => 'Pernyataan Mitra',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
