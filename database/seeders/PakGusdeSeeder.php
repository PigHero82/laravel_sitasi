<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\ListRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PakGusdeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::create([
            'nidn'              => '0828119203',
            'nama'              => 'Ida Bagus Gede Sarasvananda',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'Apuan Kaja',
            'tanggal_lahir'     => '1992-11-28',
            'ktp'               => '5106012811920004',
            'hp'                => '085737028277',
            'email'             => 'sarasvananda@stiki-indonesia.ac.id',
            'jabatan_id'        => 2,
            'prodi_id'          => 2,
            'sinta_id'          => '6709097',
            'google_scholar_id' => 'mShkhLEAAAAJ'
        ]);

        User::create([
            'nidn'                  => '0828119203',
            'password'              => Hash::make('0828119203'),
            'profile_photo_path'    => 'images/dosen/0828119203.jpg'
        ])
            ->roles()
            ->attach(Role::where('name', 'dosen')->first());

        ListRole::insert([
            'role_id' => 1,
            'user_id' => 214
        ]);
    }
}
