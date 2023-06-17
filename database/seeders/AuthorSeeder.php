<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'name' => 'John Doe'                
            ],
            [
                'name' => 'Jane Smith'          
            ],
        
        ];

        foreach ($authors as $authorData) {
            Author::create($authorData);
        }
    }
}
