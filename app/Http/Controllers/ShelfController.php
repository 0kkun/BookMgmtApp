<?php

namespace App\Http\Controllers;

use App\Shelf;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShelf;
use App\Http\Requests\EditShelf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShelfController extends Controller
{
    public function index(Shelf $shelf, Book $book, Request $request)
    {
        $books = Book::all();
        $user = Auth::user();

        $myShelfs = Shelf::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);


        // $keyword = $request->input('keyword');
        // $query = Shelf::query();
 
        // if (!empty($keyword)) {
        //     $query->where('title', 'LIKE', "%{$keyword}%");
        // }
        // $myShelfs = $query->where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);

        return view('shelfs/index', [
            'books' => $books,
            'myShelfs' => $myShelfs,
            // 'keyword' => $keyword,
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

        $shelf->user_id = auth()->id();
        $shelf->book_id = $book->id;
        $shelf->save();

        return redirect()->route('shelfs.index');
    }



    public function edit(Book $book, Shelf $shelf)
    {

        $this->checkRelation($book, $shelf);

        $is_image = false;
        if (Storage::disk('local')->exists('public/book_images/' . $book->id . '.jpg')) {
            $is_image = true;
        }

        return view('shelfs/edit', [
            'shelf' => $shelf,
            'book' => $book,
            'is_image' => $is_image,
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
