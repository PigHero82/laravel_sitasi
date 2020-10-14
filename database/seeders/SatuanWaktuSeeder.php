<?php

namespace Database\Seeders;

use App\Models\SatuanWaktu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SatuanWaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SatuanWaktu::insert([
            'nama'          => 'Hari',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        SatuanWaktu::insert([
            'nama'          => 'Minggu',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        SatuanWaktu::insert([
            'nama'          => 'Bulan',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
