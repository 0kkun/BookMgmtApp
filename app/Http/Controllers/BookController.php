<?php

namespace App\Http\Controllers;

use App\Book;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBook;
use App\Http\Requests\EditBook;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // book一覧表示
    public function index(Request $request)
    {


        $keyword = $request->input('keyword');
        $query = Book::query();
 
        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }
        $books = $query->orderBy('id', 'desc')->paginate(10);


        // return view('books/index', compact('books', $resultBooks, 'keyword'));

        return view('books/index', [
            'books' => $books,
            'keyword' => $keyword,         
        ]);
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

        $is_image = false;
        if (Storage::disk('local')->exists('public/book_images/' . $book->id . '.jpg')) {
            $is_image = true;
        }

        return view('books/edit', [
            'is_image' => $is_image,
            'book' => $book,
        ]);
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


    
    // 画像登録処理
    public function upload(int $id, BookRequest $request)
    {
        $book = Book::find($id);
        $request->photo->storeAs('public/book_images', $book->id . '.jpg');

        return redirect()->route('books.edit', $book)->with('success', '画像を登録しました');
    }
}
