<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'coldDrinks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'hotDrinks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'juices', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}