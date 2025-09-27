<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $categories = [
            ['id' => 1 , 'name' => 'Pizza' , 'imagepath' => 'images\f3.png'],
            ['id' => 2 , 'name' => 'Burger' , 'imagepath' => 'images\f2.png'],
            ['id' => 3 , 'name' => 'Shawrma' , 'imagepath' => 'images\f10.png'],
            ['id' => 4 , 'name' => 'Fries' , 'imagepath' => 'images\f5.png'],
        ];
        DB::table('categories')->insertOrIgnore($categories);
    }
}
