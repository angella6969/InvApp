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
                // 'Mainframe', 'Mini Komputer', 'Local Area Network (LAN)', 'Internet',  'P.C. Unit',
                // 'Laptop',  'Note Book',   'Palm Top',  'Card Reader',
                // 'Magnetic Tape Unit',  'Floppy Disk Unit',   'Storage Modul Disk',  'Console Unit', 'CPU',
                // 'Disk Park',  'Hard Copy Console',   'Serial Pointer',  'Line Printer',  'Ploter',
                // 'Hard Disk',  'Keyboard',

                'Mainframe', 'Mini Komputer', 'Local Area Network (LAN)', 'Internet',
                'P.C. Unit', 'Laptop', 'Note Book', 'Palm Top', 'Card Reader Komputer Mainframe',
                'Magnetic Tape Unit Komputer Mainframe', 'Floppy Disk Unit Komputer Mainframe',
                'Storage Modul Disk Komputer Mainframe', 'Console Unit Komputer Mainframe',
                'CPU Komputer Mainframe', 'Disk Park Komputer Mainframe', 'Hard Copy Console Komputer Mainframe',
                'Serial Pointer Komputer Mainframe', 'Line Printer Komputer Mainframe', 'Ploter Komputer Mainframe',
                'Hard Disk Komputer Mainframe', 'Keyboard Komputer Mainframe', 'Card Reader Mini Komputer',
                'Magnetic Tape Unit Mini Komputer', 'Floppy Disk Unit Mini Komputer', 'Storage Modul Disk Mini Komputer',
                'Console Unit Mini Komputer', 'CPU Mini Komputer', 'Disk Pack Mini Komputer', 'Printer Mini Komputer',
                'Plotter Mini Komputer', 'Scanner Mini Komputer', 'Computer Compatible Mini Komputer', 'Viewer Mini Komputer',
                'Digitzer Mini Komputer', 'Keyboard Mini Komputer', 'CPU Personal Computer', 'Monitor Personal Computer',
                'Printer Personal Computer', 'Scanner Personal Computer', 'Plotter Personal Computer', 'Viewer Personal Computer',
                'Extermal Personal Computer', 'Digitzer Personal Computer', 'Keyboard Personal Computer', 'Server', 'Router', 'Hub',
                'Modem', 'Netware Interface External'
                
            ]),
            'categoryCode' => $this->faker->unique()->numerify('INF-####'),
            // 'name'=>$this->faker->randomElements(['Elektronik', 'Non Elektronik', 'Software', 'Hardware']),
        ];
    }
}
