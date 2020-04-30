<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBook;

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



    // 新規作成画面表示
    public function showCreateForm()
    {
        return view('books/create');
    }






    // 新規作成
    public function create(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->genre = $request->genre;
        $book->book_volume = $request->book_volume;

        $book->save();

        $books = Book::all();
    
        return view('books/index', [
            'books' => $books,
        ]);
    }




    // // 編集画面表示
    // public function showEditForm(int $id)
    // {
    //     $book = Book::find($id);
    
    //     return view('books/edit', [
    //         'book' => $book,
    //     ]);
    // }




    // // 編集処理
    // public function edit(int $id)
    // {
    //     // 1
    //     $book = Book::find($id);

    //     // 2
    //     $book->title = $request->title;
    //     $task->status = $request->status;
    //     $task->due_date = $request->due_date;
    //     $task->save();

    //     // 3
    //     return redirect()->route('tasks.index', [
    //         'id' => $task->folder_id,
    //     ]);
    // }
}
