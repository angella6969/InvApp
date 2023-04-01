<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\role;
use App\Models\category;
use App\Models\item;
use Nette\Schema\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        item::factory(400)->create();
        // category::factory(4)->create();

        category::create([
            'name' => 'Non Elektronik',

        ]);
        category::create([
            'name' => 'Elektronik',

        ]);
        role::create([
            'name' => 'Super Admin',

        ]);
        role::create([
            'name' => 'Admin',

        ]);
        role::create([
            'name' => 'user',

        ]);

    }
}
