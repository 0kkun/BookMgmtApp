<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        // view(表示するview, [view側で参照する際の変数名, 渡す配列])
        return view('books/index', [
            'books' => $books,
        ]);
    }
}
