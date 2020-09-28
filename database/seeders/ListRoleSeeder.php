<?php

namespace Database\Seeders;

use App\Models\ListRole;
use Illuminate\Database\Seeder;

class ListRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListRole::insert([
            'role_id' => 1,
            'user_id' => 1
        ]);

        ListRole::insert([
            'role_id' => 2,
            'user_id' => 1
        ]);

        ListRole::insert([
            'role_id' => 2,
            'user_id' => 2
        ]);

        ListRole::insert([
            'role_id' => 3,
            'user_id' => 3
        ]);

        ListRole::insert([
            'role_id' => 4,
            'user_id' => 3
        ]);

        ListRole::insert([
            'role_id' => 3,
            'user_id' => 4
        ]);

        ListRole::insert([
            'role_id' => 5,
            'user_id' => 4
        ]);

        ListRole::insert([
            'role_id' => 3,
            'user_id' => 5
        ]);

        ListRole::insert([
            'role_id' => 6,
            'user_id' => 5
        ]);

        ListRole::insert([
            'role_id' => 3,
            'user_id' => 6
        ]);

        ListRole::insert([
            'role_id' => 6,
            'user_id' => 6
        ]);

        ListRole::insert([
            'role_id' => 3,
            'user_id' => 7
        ]);

        ListRole::insert([
            'role_id' => 6,
            'user_id' => 7
        ]);

        ListRole::insert([
            'role_id' => 3,
            'user_id' => 8
        ]);

        ListRole::insert([
            'role_id' => 6,
            'user_id' => 8
        ]);
    }
}
