<?php

namespace Database\Seeders;

use App\Models\Biblioteca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BibliotecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libraries = [
            [
                'name' => 'Central Library',
                'address' => '123 Main Street'               
            ],
            [
                'name' => 'Public Library',
                'address' => '456 Elm Street'              
            ]
          
        ];

        foreach ($libraries as $libraryData) {
            Biblioteca::create($libraryData);
        }
    }
}
