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
            'nama'          => 'Target 1',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Target 2',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        LuaranTarget::insert([
            'nama'          => 'Target 3',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
