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
            'nama'          => 'BELANJA BAHAN',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        RabJenis::insert([
            'nama'          => 'BELANJA BARANG NON OPERASIONAL LAINNYA',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
            
        RabJenis::insert([
            'nama'          => 'BELANJA PERJALANAN LAINNYA',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
