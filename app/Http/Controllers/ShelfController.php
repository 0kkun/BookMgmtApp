<?php

namespace App\Http\Controllers;

use App\Shelf;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShelf;

class ShelfController extends Controller
{
    public function index(Shelf $shelf, Book $book)
    {

        $shelfs = Shelf::orderBy('id', 'desc')->paginate(10);
        $books = Book::all();

        return view('shelfs/index', [
            'books' => $books,
            'shelfs' => $shelfs,
        ]);
    }




    // shelf新規作成画面表示
    public function create(Shelf $shelf, Book $book)
    {

        return view('shelfs/create', [
            'book_id' => $book->id,
            'shelf' => $shelf,
            'book' => $book,
        ]);
    }


    public function store(Book $book, CreateShelf $request)
    {
        $shelf = new Shelf();
        $shelf->status = $request->status;
        $shelf->finished_amount = $request->finished_amount;
        $shelf->point = $request->point;

        // $shelf->user_id = auth()->id();
        $shelf->book_id = $book->id;
        $shelf->save();
        // $book->shelf()->save($shelf);

        return redirect()->route('shelfs.index');
    }


}
