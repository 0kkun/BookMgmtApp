<?php

namespace App\Http\Controllers;

use App\Shelf;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShelf;
use App\Http\Requests\EditShelf;

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


    // shelf新規作成
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



    // GET /folders/{id}/tasks/{task_id}/edit
    public function edit(Book $book, Shelf $shelf)
    {

        $this->checkRelation($book, $shelf);

        return view('shelfs/edit', [
            'shelf' => $shelf,
            'book' => $book,
        ]);
    }



    // shelf編集機能
    public function update(Book $book, Shelf $shelf, EditShelf $request)
    {
        $this->checkRelation($book, $shelf);

        $shelf->status = $request->status;
        $shelf->finished_amount = $request->finished_amount;
        $shelf->point = $request->point;
        $shelf->save();

        return redirect()->route('shelfs.index');
    }




    // エラーハンドリング用のメソッド
    private function checkRelation(Book $book, Shelf $shelf)
    {
        if ($book->id !== $shelf->book_id) {
            abort(404);
        }
    }



    // book削除処理
    public function delete (Request $request)
    {
        // Shelf::find($request->id)->delete();
        Shelf::destroy($request->id);
        return redirect()->route('shelfs.index');
    }

}
