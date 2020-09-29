<?php

namespace Database\Seeders;

use App\Models\Skema;
use Illuminate\Database\Seeder;

class SkemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skema::create([
            'kode'  => 'PDP',
            'nama'  => 'Penelitian Dosen Pemula',
            'jenis' => 1
        ]);
        
        Skema::create([
            'kode'  => 'PPDS Batch 1',
            'nama'  => 'Penelitian Pengembangan Dosen STIKI',
            'jenis' => 1
        ]);
        
        Skema::create([
            'kode'  => 'PKM STIKI Peduli (Tahunan) Batch 1',
            'nama'  => 'Pengabdian Kepada Masyarakat',
            'jenis' => 2
        ]);
        
        Skema::create([
            'kode'  => 'PKM STIKI Peduli (Insidental) Batch 1',
            'nama'  => 'Pengabdian Kepada Masyarakat',
            'jenis' => 2
        ]);
        
        Skema::create([
            'kode'  => 'PPDS Batch 2',
            'nama'  => 'Penelitian Pengembangan Dosen STIKI Batch 2',
            'jenis' => 1
        ]);
        
        Skema::create([
            'kode'  => 'PKM STIKI Peduli (Tahunan) Batch 2',
            'nama'  => 'Pengabdian Kepada Masyarakat STIKI Peduli (Tahunan) Batch 2',
            'jenis' => 2
        ]);
        
        Skema::create([
            'kode'  => 'PKM STIKI Peduli (Insidental) Batch 2',
            'nama'  => 'Pengabdian Kepada Masyarakat STIKI Peduli (Insidental) Batch 2',
            'jenis' => 2
        ]);
        
        Skema::create([
            'kode'  => 'PPDS',
            'nama'  => 'Penelitian Pengembangan Dosen STIKI',
            'jenis' => 1
        ]);
        
        Skema::create([
            'kode'  => 'PDM',
            'nama'  => 'Penelitian Dosen Mahasiswa',
            'jenis' => 1
        ]);
        
        Skema::create([
            'kode'  => 'SSE',
            'nama'  => 'STIKI Social Engagement',
            'jenis' => 2
        ]);
    }
}
