<?php

namespace Database\Seeders;

use App\Models\MitraJenis;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MitraJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MitraJenis::insert([
            'nama'          => 'Perusahaan/Industri/CSR',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        
        MitraJenis::insert([
            'nama'          => 'Produktif Ekonomi/Wirausahawan',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        
        MitraJenis::insert([
            'nama'          => 'Non Produktif Ekonomi',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        
        MitraJenis::insert([
            'nama'          => 'Calon Wirausahawan',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
