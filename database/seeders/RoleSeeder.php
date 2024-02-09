<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = [
            [
                'name'       => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'user',
                'guard_name' => 'web'
            ],
        ];

        foreach ($datas as $value) {

            Role::create([
                'name'       => $value['name'],
                'guard_name' => $value['guard_name']
            ]);

        }
    }
}
