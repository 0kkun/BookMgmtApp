
@extends('layout')

@section('content')

  <section class="bg-dark container-fluid">
    <div class="row text-center bg-dark">
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/users/{{ Auth::user()->id }}">Profile</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/shelfs">My Shelf</a></div>
      <div class="col-4 pt-2 pb-2 bg-primary"><a class="text-white h5" href="/books">Search</a></div>
    </div>
  </section>

  <section class="new-edit-form bg-light">
    <!------------- エラー処理 ----------------->
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <!---------------------------------------->
    @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <div class="container">
      <div class="row">
        <div class="col-sm-4 text-center pt-5">
            <div class="no-image text-center bg-secondary text-white pt-5 display-4 mb-2 border rounded">
              No image
            </div>

          <!-- @if ($is_image)
            <figure>
              <img src="/storage/book_images/{{ $book->id }}.jpg" width="250px" height="300px" class="border rounded">
            </figure>
          @else
            <div class="no-image text-center bg-secondary text-white pt-5 display-4 mb-2 border rounded">
              No image
            </div>
          @endif
          <form method="POST" action="{{ route('books.upload', ['id' => $book->id]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label class="btn btn-primary submit-label">
              画像を選択
              <input type="file" name="photo">
            </label>
            <label class="btn btn-primary ml-3 submit-label mr-5">
              登録
              <input type="submit">
            </label>  
          </form> -->
        </div>
        
        <div class="col-sm-8 pt-4">
          <div class="row">
            <div class="col-6 font-weight-bold text-right">
              <p class="pt-2">タイトル：</p>
              <p class="pt-1">ジャンル：</p>
              <p class="pt-2">総巻数：</p>
            </div>
            <div class="col-6">
              <form action="{{ route('books.edit', ['id' => $book->id]) }}" method="POST">
                <div class="form-group">
                  @csrf
                  <input type="text" class="form-control mb-2" name="title" id="title" value="{{ old('title') ?? $book->title }}" />

                  <select name="genre" id="genre" class="form-control mb-2">
                    @foreach(\App\Book::GENRE as $key => $val)
                      <option value="{{$key}}" {{ $key == old('genre', $book->genre) ? 'selected' : '' }}>
                        {{ $val['label'] }}
                      </option>
                    @endforeach
                  </select>

                  <input type="number" class="form-control" name="book_volume" id="book_volume" value="{{ old('book_volume') ?? $book->book_volume }}" />

                  <div class="text-right">
                    <button type="submit" class="btn mt-5 btn-success">編集保存</button>
                  </div>
                </div>
              </form>
              <div class="text-right">
                <form method="post" action="/book/delete/{{$book->id}}">
                  {{ csrf_field() }}
                  <input type="submit" value="削除" class="btn btn-danger btn mb-3" onclick='return confirm("本当に削除しますか？");'>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection