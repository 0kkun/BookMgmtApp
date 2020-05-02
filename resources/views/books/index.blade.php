
@extends('layout')

@section('content')
  <section>
    <div>
      <div class="row">
        <div class="col-4 text-center bg-dark pt-2"><a class="text-white" href="/users/{{ Auth::user()->id }}"><h5>Profile</h5></a></div>
        <div class="col-4 text-center bg-dark pt-2"><a class="text-white" href="#"><h5>My Shelf</h5></a></div>
        <div class="col-4 text-center pt-2 bg-primary"><a class="text-white" href="/books"><h5>Search</h5></a></div>
      </div>
    </div>
  </section>

  <section class="shelf bg-light">


    <div class="input-group container pt-5 px-5 w-75">
      <input type="text" class="form-control" placeholder="テキスト入力欄">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default bg-dark text-white">検索</button>
      </span>
      <a href="{{ route('books.create') }}" class="btn-sm btn-primary ml-4 pt-2">本を新規登録</a>
    </div>

    <div class="bg-light text-center py-5">
      <div class="container shelf-table">
        <table class="table table-hover table-striped ">
          <thead>
            <tr>
              <th>追加</th><th>タイトル</th><th>ジャンル</th><th>総巻数</th><th>編集</th>
            </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
              <tr>
                <td><button class="btn-sm btn-primary">追加</button></td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->genre_label }}</td>
                <td>{{ $book->book_volume }}</td>     
                <td><a href="{{ route('books.edit', ['id' => $book->id]) }}">編集</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection