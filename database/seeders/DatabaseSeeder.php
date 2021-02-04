<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(DosenSeeder::class);
        $this->call(JabatanSeeder::class);
        // $this->call(ListRoleSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RumpunIlmuSeeder::class);
        $this->call(SkemaSeeder::class);
        // $this->call(UserSeeder::class);
        
        $this->call(LuaranKelompokSeeder::class);
        $this->call(LuaranLuaranSeeder::class);
        $this->call(LuaranTargetSeeder::class);
        $this->call(PeranSeeder::class);
        $this->call(RabJenisSeeder::class);
        $this->call(SatuanWaktuSeeder::class);
        // $this->call(SkemaUsulanSeeder::class);

        $this->call(JenisBerkasSeeder::class);
        $this->call(MitraJenisSeeder::class);
        $this->call(PakGusdeSeeder::class);
    }
}
