<?php

namespace Database\Seeders;

use App\Models\SkemaUsulan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SkemaUsulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SkemaUsulan::insert([
            'skema_id'                  => 1,
            'jenis'                     => 1,
            'jumlah'                    => 3,
            'tahun_skema'               => 2020,
            'tahun_penelitian'          => 2020,
            'tanggal_usulan'            => 2020-10-30,
            'tanggal_review'            => 2020-11-30,
            'tanggal_laporan_kemajuan'  => 2020-12-30,
            'tanggal_laporan_akhir'     => 2021-01-30,
            'tanggal_publikasi'         => 2021-02-28,
            'jabatan_minimal'           => 0,
            'jabatan_maksimal'          => 99,
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now()
        ]);

        SkemaUsulan::insert([
            'skema_id'                  => 2,
            'jenis'                     => 1,
            'jumlah'                    => 2,
            'tahun_skema'               => 2020,
            'tahun_penelitian'          => 2020,
            'tanggal_usulan'            => 2020-10-30,
            'tanggal_review'            => 2020-11-30,
            'tanggal_laporan_kemajuan'  => 2020-12-30,
            'tanggal_laporan_akhir'     => 2021-01-30,
            'tanggal_publikasi'         => 2021-02-28,
            'dana_maksimal'             => 1000000,
            'jabatan_minimal'           => 1,
            'jabatan_maksimal'          => 2,
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now()
        ]);

        SkemaUsulan::insert([
            'skema_id'                  => 5,
            'jenis'                     => 1,
            'jumlah'                    => 5,
            'tahun_skema'               => 2020,
            'tahun_penelitian'          => 2020,
            'tanggal_usulan'            => 2020-10-30,
            'tanggal_review'            => 2020-11-30,
            'tanggal_laporan_kemajuan'  => 2020-12-30,
            'tanggal_laporan_akhir'     => 2021-01-30,
            'tanggal_publikasi'         => 2021-02-28,
            'dana_maksimal'             => 500000,
            'jabatan_minimal'           => 2,
            'jabatan_maksimal'          => 5,
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now()
        ]);

        SkemaUsulan::insert([
            'skema_id'                  => 3,
            'jenis'                     => 2,
            'jumlah'                    => 3,
            'tahun_skema'               => 2020,
            'tahun_penelitian'          => 2020,
            'tanggal_usulan'            => 2020-10-30,
            'tanggal_review'            => 2020-11-30,
            'tanggal_laporan_kemajuan'  => 2020-12-30,
            'tanggal_laporan_akhir'     => 2021-01-30,
            'tanggal_publikasi'         => 2021-02-28,
            'jabatan_minimal'           => 0,
            'jabatan_maksimal'          => 99,
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now()
        ]);

        SkemaUsulan::insert([
            'skema_id'                  => 4,
            'jenis'                     => 2,
            'jumlah'                    => 2,
            'tahun_skema'               => 2020,
            'tahun_penelitian'          => 2020,
            'tanggal_usulan'            => 2020-10-30,
            'tanggal_review'            => 2020-11-30,
            'tanggal_laporan_kemajuan'  => 2020-12-30,
            'tanggal_laporan_akhir'     => 2021-01-30,
            'tanggal_publikasi'         => 2021-02-28,
            'dana_maksimal'             => 1000000,
            'jabatan_minimal'           => 1,
            'jabatan_maksimal'          => 2,
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now()
        ]);

        SkemaUsulan::insert([
            'skema_id'                  => 10,
            'jenis'                     => 2,
            'jumlah'                    => 5,
            'tahun_skema'               => 2020,
            'tahun_penelitian'          => 2020,
            'tanggal_usulan'            => 2020-10-30,
            'tanggal_review'            => 2020-11-30,
            'tanggal_laporan_kemajuan'  => 2020-12-30,
            'tanggal_laporan_akhir'     => 2021-01-30,
            'tanggal_publikasi'         => 2021-02-28,
            'dana_maksimal'             => 500000,
            'jabatan_minimal'           => 2,
            'jabatan_maksimal'          => 5,
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now()
        ]);
    }
}
