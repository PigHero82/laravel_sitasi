<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'admin',
            'description'   => 'Administrator'
        ]);

        Role::create([
            'name'          => 'pimpinan',
            'description'   => 'Pimpinan'
        ]);

        Role::create([
            'name'          => 'dosen',
            'description'   => 'Dosen'
        ]);

        Role::create([
            'name'          => 'penelitian',
            'description'   => 'Koordinator Bidang Penelitian'
        ]);

        Role::create([
            'name'          => 'pengabdian',
            'description'   => 'Koordinator Bidang Pengabdian'
        ]);

        Role::create([
            'name'          => 'reviewer',
            'description'   => 'Reviewer'
        ]);
    }
}
