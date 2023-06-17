<?php

namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;



class BookController extends Controller
{
    /*public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }*/

    public function index(Request $request)
    {
        $pageNumber = $request->query('page', 1);
        $pageSize = $request->query('pageSize', 10); 


        //con datos con borrado logico
        $books = Book::paginate($pageSize, ['*'], 'page', $pageNumber);

        return $books;
    }


    public function search(Request $request)
    {

        $pageNumber = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 5); 

        //$query = Book::query()

        $query = DB::table('books')
        ->select('books.id','books.title', 'author_id', 'editorial_id',
        'biblioteca_id', 'synopsis','books.language','books.pagesNumber'
        ,'books.publishingDate','books.isbn')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->join('editorials', 'books.editorial_id', '=', 'editorials.id')
        ->join('bibliotecas', 'books.biblioteca_id', '=', 'bibliotecas.id');
        
    
        // Apply filters based on request parameters
        if ($request->has('author') && $request->input('author') != "") {
            //$query->where('author_id', $request->input('authorid'));
            $query->where('authors.name', 'LIKE', '%'.$request->input('author').'%');
        }
    
        if ($request->has('editorialid') && $request->input('editorialid') > 0) {
            $query->where('editorial_id', $request->input('editorialid'));
        }

        if ($request->has('libraryid') && $request->input('libraryid') > 0) {
            $query->where('biblioteca_id', $request->input('libraryid'));
        }
    
        if ($request->has('date') && $request->input('date') != "") {
            $query->where('publishingDate', $request->input('date'));
        }
    
        if ($request->has('language') && $request->input('language') != "") {
            $query->where('language', $request->input('language'));
        }
    
        if ($request->has('isbn') && $request->input('isbn') != "") {
            $query->where('isbn', $request->input('isbn'));
        }

        if ($request->has('title') && $request->input('title') != "") {
            $query->where('title', 'LIKE', '%'.$request->input('title').'%');
        }   

        $result = $query->whereNull('deleted_at')->paginate($pageSize, ['*'], 'page', $pageNumber);

        // se ignoran bondades de eloquent por "comodidad" y "tiempo"
    
        return response()->json($result);
    }
    

    public function onlyTrashed(Request $request)
    {
        $pageNumber = $request->query('page', 1);
        $pageSize = $request->query('pageSize', 10); // Default page size is 10, change as needed

        $books = Book::onlyTrashed()
            ->paginate($pageSize, ['*'], 'page', $pageNumber);

        return $books;
    }


    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id)->with('editorial')->with('library')->with('authors')->get();
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function moveToTrash($id)
    {
        $book = Book::findOrFail($id);

        // Soft-delete the book
        $book->delete();

        return response()->json(['message' => 'Book moved to trash']);
    }

    public function restore($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);

        // Restore the soft-deleted book
        $book->restore();

        return response()->json(['message' => 'Book restored']);
    }



    public function destroy($id)
    {
        Book::destroy($id);
        return response()->json(null, 204);
    }
}