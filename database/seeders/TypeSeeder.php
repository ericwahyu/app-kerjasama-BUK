<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas =[
            [
                'name' => 'Memorandum of Aggreement (MoA)',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'name' => 'Memorandum of Understanding (MoU)',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'name' => 'Implementation Arrangement (IA)',
                'created_at' => null,
                'updated_at' => null,
            ],

        ];
        DB::table('types')->insert($datas);
    }
}
