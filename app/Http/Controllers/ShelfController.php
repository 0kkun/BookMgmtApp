<?php

namespace App\Http\Controllers;

use App\Shelf;
use App\Book;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    public function index(Shelf $shelf, Book $book)
    {

        $shelfs = Shelf::all();
        $books = Book::all();

        return view('shelfs/index', [
            'books' => $books,
            'shelfs' => $shelfs,
        ]);
    }

            // 'books' => $books,
            // 'current_book_id' => $current_book->id,
     
        // すべてのフォルダを取得する
        // $books = Book::all();
        // $shelfs = Shelf::all();
        // $shelf = Shelf::where('book_id', $shelfs->id)->get();
        // $shelfs = Shelf::with('books')->get();

        // $shelfs = Shelf::all();
        // $shelfs = $books->shelfs()->get();
        // $books = Shelf::where('book_id', $book->id)->get();

        // データ確認用
        // dd($books->ToArray()); 
        // dd($shelfs->ToArray()); 

        // $books = Shelf::whereHas('books', function($q){
        //     $q->where('id', '>', 'shelfs->id');
        // })->get();

}
