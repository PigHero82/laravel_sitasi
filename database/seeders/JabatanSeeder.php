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
            'nama'      => 'Asisten Ahli'
        ]);

        Jabatan::create([
            'nama'      => 'Lektor'
        ]);

        Jabatan::create([
            'nama'      => 'Lektor Kepala'
        ]);

        Jabatan::create([
            'nama'      => 'Pegawai'
        ]);

        Jabatan::create([
            'nama'      => 'Profesor'
        ]);

        Jabatan::create([
            'nama'      => 'Tenaga Pengajar'
        ]);
    }
}
