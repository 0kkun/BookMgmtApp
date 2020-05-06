
@extends('layout')

@section('content')
  <section class="bg-dark container-fluid">
    <div class="row text-center bg-dark">
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/users/{{ Auth::user()->id }}">Profile</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/shelfs">My Shelf</a></div>
      <div class="col-4 pt-2 pb-2 bg-primary"><a class="text-white h5" href="/books">Search</a></div>
    </div>
  </section>

  <section class="shelf bg-light container-fluid">
    
      <form action="{{url('/books')}}" method="GET">
        <div class="input-group  container-fluid pt-5 px-sm-5 search-box">
          <input type="text" class="form-control" name="keyword" value="{{$keyword}}" placeholder="タイトル名で検索">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default bg-dark text-white">検索</button>
          </span>
          <a href="{{ route('books.create') }}" class="btn-sm btn-primary ml-4 pt-2">本を新規登録</a>
        </div>
      </form>



    <div class="bg-light text-center pt-4 pb-3 h6">


      <div class="container book-table">
        @if($books->count())

        <table class="table ">
          <thead>
            <tr>
              <th class="non title">タイトル</th>
              <th scope=" genre">ジャンル</th>
              <th scope=" amount">最新巻</th>
              <th scope=" button">追加・編集</th>
            </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
              <tr>
                <th class="title">{{ $book->title }}</th>
                <td data-label="ジャンル" class="txt text-center">{{ $book->genre_label }}</td>
                <td data-label="最新巻" class="text-center">{{ $book->book_volume }}</td>
                <td data-label="追加/編集" class="text-center button"><a href="{{ route('shelfs.create', ['id' => $book->id]) }}" class="btn-sm btn-primary">追加</a> <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn-sm btn-primary">編集</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>


<!-- 

        <table class="table table-hover table-striped ">
          <thead>
            <tr class= "bg-secondary text-white">
              <th>追加</th><th>タイトル</th><th>ジャンル</th><th>総巻数</th><th>編集</th>
            </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
              <tr>
                <td><a href="{{ route('shelfs.create', ['id' => $book->id]) }}" class="btn-sm btn-primary">追加</a></td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->genre_label }}</td>
                <td>{{ $book->book_volume }}</td>     
                <td><a href="{{ route('books.edit', ['id' => $book->id]) }}">編集</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <p>見つかりませんでした。</p>
        @endif　-->
        {{ $books->links() }} 
      </div>


    </div>
  </section>
@endsection