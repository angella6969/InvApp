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


        // Schema::disableForeignKeyConstraints();
        // category::truncate();
        // Schema::enableForeignKeyConstraints();

    //     $data = [
    //         'Non Elektronik','Electronik','software','hardware'
    //     ];

    //     foreach($data as $value)
    //     {
    //         category::insert([
    //             'name'=> $value 
    //         ]);
    //     }


    //     $data1 = [
    //         'Super Admin','admin','client'
    //     ];

    //     foreach($data1 as $value1)
    //     {
    //         role::insert([
    //             'name'=> $value1 
    //         ]);
    //     }
    }
}
