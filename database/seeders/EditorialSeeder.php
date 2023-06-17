<?php

namespace Database\Seeders;

use App\Models\Editorial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $editorials = [
            [
                'name' => 'ABC Publications',
                'address' => 'New York',
            ],
            [
                'name' => 'XYZ Books',
                'address' => 'Los Angeles',
            ],
      
        ];

        foreach ($editorials as $editorialData) {
            Editorial::create($editorialData);
        }
    }
}
