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
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        User::factory(10)->create();
        // category::factory(48)->create();
        role::factory(3)->create();
        // item::factory(400)->create();
      
        user::create([
            'name' => 'Super Admin',
            'username' => 'Super Admin',
            'email' => 'superadmin@yahoo.com',
            'password' => Hash::make('123456'),
            'role_id' => '1',
            'status' => 'active',

        ]);
    }
}
