<?php

namespace App\Http\Controllers;

use App\Book;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBook;
use App\Http\Requests\EditBook;

class BookController extends Controller
{
    // book一覧表示
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(20);

        return view('books/index', compact('books'));
    }



    // book新規作成画面表示
    public function showCreateForm()
    {
        return view('books/create');
    }






    // book新規作成処理
    public function create(CreateBook $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->genre = $request->genre;
        $book->book_volume = $request->book_volume;

        $book->save();
    
        return redirect()->route('books.index');
    }




    // book編集画面表示
    public function showEditForm(int $id)
    {
        $book = Book::find($id);
    
        return view('books/edit', compact('book'));
    }




    // book編集処理
    public function edit(int $id, EditBook $request)
    {
        $book = Book::find($id);

        $book->title = $request->title;
        $book->genre = $request->genre;
        $book->book_volume = $request->book_volume;

        $book->save();

        return redirect()->route('books.index');
    }


    // book削除処理
    public function delete (Request $request)
    {
        Book::find($request->id)->delete();
        return redirect()->route('books.index');
    }
}
