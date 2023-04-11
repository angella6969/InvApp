<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\item;
use App\Models\role;
use App\Models\User;
use App\Models\category;
use App\Models\rent_log;
use Nette\Schema\Schema;
use Illuminate\Database\Seeder;

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
        User::factory(10)->create();
        category::factory(4)->create();
        // role::factory(3)->create();
        item::factory(400)->create();
        // rent_log::factory(40)->create();

        

      
        // role::create([
        //     'name' => 'Super Admin',

        // ]);
        // role::create([
        //     'name' => 'Admin',

        // ]);
        // role::create([
        //     'name' => 'Client',

        // ]);

    }
}
