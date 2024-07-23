<?php

namespace Database\Seeders;

use App\Models\Beverage;
use App\Models\Category;
use App\Models\Drink;
use App\Models\SpecialItem;
use App\Models\BeverageList;
use App\Models\Message;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Message::factory(5)->create();
        Beverage::factory(5)->create();
        User::factory(5)->create();
        SpecialItem::factory()->count(10)->create();
          //  Category::factory(5)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'userName' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
