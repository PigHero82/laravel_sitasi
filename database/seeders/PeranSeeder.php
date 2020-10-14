<?php

namespace Database\Seeders;

use App\Models\Peran;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peran::insert([
            'nama'          => 'Anggota',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
