<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Mainframe', 'Mini Komputer', 'Local Area Network (LAN)', 'Internet',  'P.C. Unit',
                'Laptop',  'Note Book',   'Palm Top',  'Card Reader',
                'Magnetic Tape Unit',  'Floppy Disk Unit',   'Storage Modul Disk',  'Console Unit', 'CPU',
                'Disk Park',  'Hard Copy Console',   'Serial Pointer',  'Line Printer',  'Ploter',
                'Hard Disk',  'Keyboard', 
            ]),
            // 'name'=>$this->faker->randomElements(['Elektronik', 'Non Elektronik', 'Software', 'Hardware']),
        ];
    }
}
