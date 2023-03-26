<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Non Elektronik','Electronik','software','hardware'
        ];

        foreach($data as $value)
        {
            category::insert([
                'name'=> $value 
            ]);
        }
    }
}
