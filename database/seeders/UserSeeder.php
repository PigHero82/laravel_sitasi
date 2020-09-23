<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nidn'      => '0100',
            'password'  => Hash::make('0100')
        ])
            ->roles()
            ->attach(Role::where('name', 'admin')->first());

        User::create([
            'nidn'      => '0101',
            'password'  => Hash::make('0101')
        ])
            ->roles()
            ->attach(Role::where('name', 'dosen')->first());

        User::create([
            'nidn'      => '0102',
            'password'  => Hash::make('0102')
        ])
            ->roles()
            ->attach(Role::where('name', 'dosen')->first());

        User::create([
            'nidn'      => '0103',
            'password'  => Hash::make('0103')
        ])
            ->roles()
            ->attach(Role::where('name', 'dosen')->first());

        User::create([
            'nidn'      => '0104',
            'password'  => Hash::make('0104')
        ])
            ->roles()
            ->attach(Role::where('name', 'dosen')->first());

        User::create([
            'nidn'      => '0105',
            'password'  => Hash::make('0105')
        ])
            ->roles()
            ->attach(Role::where('name', 'dosen')->first());

        User::create([
            'nidn'      => '0106',
            'password'  => Hash::make('0106')
        ])
            ->roles()
            ->attach(Role::where('name', 'dosen')->first());

        User::create([
            'nidn'      => '0107',
            'password'  => Hash::make('0107')
        ])
            ->roles()
            ->attach(Role::where('name', 'dosen')->first());
    }
}
