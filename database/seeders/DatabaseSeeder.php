<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'FIC17 Kris',
            'email' => 'kris@fic17.com',
            'password' => Hash::make('12345678'),
            'phone' => '08123456789',
            'role' => 'admin',
        ]);

        // category factory
        Category::factory(2)->create();

        // product factory
        Product::factory(100)->create();
    }
}
