<?php

namespace Database\Seeders;

use App\Models\LuaranKelompok;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LuaranKelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuaranKelompok::insert([
            'nama'          => 'Kelompok 1',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranKelompok::insert([
            'nama'          => 'Kelompok 2',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranKelompok::insert([
            'nama'          => 'Kelompok 3',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
