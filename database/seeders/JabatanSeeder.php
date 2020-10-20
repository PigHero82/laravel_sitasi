<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'nama'  => 'Tenaga Pengajar',
            'level' => 1
        ]);

        Jabatan::create([
            'nama'  => 'Asisten Ahli',
            'level' => 2
        ]);

        Jabatan::create([
            'nama'  => 'Lektor',
            'level' => 3
        ]);

        Jabatan::create([
            'nama'  => 'Lektor Kepala',
            'level' => 4
        ]);

        Jabatan::create([
            'nama'  => 'Profesor',
            'level' => 5
        ]);

        Jabatan::create([
            'nama'  => 'Pegawai',
            'level' => 6
        ]);
    }
}
