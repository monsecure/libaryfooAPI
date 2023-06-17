Book API
Book API is a RESTful web service for managing a library's book collection. It provides endpoints for registering books, performing CRUD operations, and searching for books based on various criteria.

Prerequisites
Before setting up the Book API, make sure you have the following installed on your system:

PHP: Download and Install PHP +8.0
Composer: Download and Install Composer
Laravel: Install Laravel globally by running the following command:
javascript

composer global require laravel/installer
Getting Started
To get started with the Book API, follow the steps below:

Clone the repository:

bash

git clone <https://github.com/monsecure/libaryfooAPI.git>
Navigate to the project directory:

bash

cd book-api
Install dependencies:


composer install
Create the environment file:

Rename the .env.example file to .env.
Open the .env file and configure the database connection settings according to your environment.
Generate the application key:

php artisan migrate
Seed the database (optional):
If you want to populate the database with sample data, run the following command:

run migrations looking for run book migration at the last time
run seeders from non main CRUD models :

php artisan db:seed


Launch the development server:


php artisan serve
Access the API:
Open your web browser or API testing tool and make requests to http://localhost:8000/api to access the Book API.

API Endpoints
The Book API provides the following endpoints:

GET /api/books: Retrieve a list of all books.
POST /api/books: Register a new book.
GET /api/books/{id}: Retrieve a specific book by its ID.
PUT /api/books/{id}: Update a specific book.
DELETE /api/books/{id}: Delete a specific book.
GET /api/books/search: Search for books based on specified filters.
.
.
.


