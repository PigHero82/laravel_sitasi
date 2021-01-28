<?php

namespace Database\Seeders;

use App\Models\LuaranTarget;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LuaranTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuaranTarget::insert([
            'nama'          => 'Draf',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Submitted',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Reviewed',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Accepted',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Published',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Terdaftar',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Sudah Dilaksanakan',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Granted',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Produk',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Penerapan',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Proses Editing',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Sudah Terbit',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
