<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'Book 1',
                'author' => 'Author 1',
                'editorial' => 'Editorial 1',
            ],
            [
                'title' => 'Book 2',
                'author' => 'Author 2',
                'editorial' => 'Editorial 2',
            ],
            // Add more books as needed
            [
                'title' => 'Book 3',
                'author' => 'Author 3',
                'editorial' => 'Editorial 3',
            ],
            [
                'title' => 'Book 4',
                'author' => 'Author 4',
                'editorial' => 'Editorial 4',
            ],
            // Add more books as needed
            [
                'title' => 'Book 5',
                'author' => 'Author 5',
                'editorial' => 'Editorial 5',
            ],
            [
                'title' => 'Book 7',
                'author' => 'Author 7',
                'editorial' => 'Editorial 7',
            ],
            [
                'title' => 'Book 8',
                'author' => 'Author 8',
                'editorial' => 'Editorial 8',
            ],
            [
                'title' => 'Book 9',
                'author' => 'Author 9',
                'editorial' => 'Editorial 9',
            ]            
        
        ];

        foreach ($books as $bookData) {
            Book::create($bookData);
        }
    }
}
