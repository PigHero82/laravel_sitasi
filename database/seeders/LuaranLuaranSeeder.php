<?php

namespace Database\Seeders;

use App\Models\LuaranLuaran;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LuaranLuaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuaranLuaran::insert([
            'nama'          => 'Luaran 1',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranLuaran::insert([
            'nama'          => 'Luaran 2',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranLuaran::insert([
            'nama'          => 'Luaran 3',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
