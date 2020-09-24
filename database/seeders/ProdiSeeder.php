<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'nama'      => 'Sistem Komputer',
            'kepala'    => 2
        ]);

        Prodi::create([
            'nama'      => 'Teknik Informatika',
            'kepala'    => 3
        ]);
    }
}
