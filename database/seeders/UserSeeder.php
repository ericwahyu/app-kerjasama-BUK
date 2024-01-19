<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas =[
            [
                'name'          => 'ADRIAN',
                'username'      => 'adrian',
                'email'         => 'adrian@gmail.com',
                'password'      => Hash::make('123'),
                'created_at'    => null,
                'updated_at'    => null,
            ],
        ];
        DB::table('users')->insert($datas);
    }
}
