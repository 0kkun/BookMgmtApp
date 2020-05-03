
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
    <div class="container">
      <div class="row">
        <div class="col-sm-3 text-center">
          <img src="img/dragonball.jpg" class="book-img mb-5 mt-5">
          <label>
            <span class="btn btn-primary">
              Choose File
              <input type="file" style="display:none">
            </span>
          </label>
        </div>
        <div class="col-sm-9 pt-5">
          <div class="row">
            <div class="col-6 font-weight-bold text-right">
              <p class="pt-2">タイトル：</p>
              <p class="pt-1">ジャンル：</p>
              <p class="pt-2">総巻数：</p>
            </div>
            <div class="col-6">
              <form action="{{ route('books.create') }}" method="POST">
                <div class="form-group">
                  @csrf
                  <input type="text" class="form-control mb-2" name="title" id="title" value="{{ old('title') }}" />

                  <select name="genre" id="genre" class="form-control mb-2">
                    @foreach(\App\Book::GENRE as $key => $val)
                      <option value="{{$key}}">
                        {{ $val['label'] }}
                      </option>
                    @endforeach
                  </select>

                  <input type="number" name="book_volume" id="book_volume" class="form-control mb-2" value="{{ old('book_volume') }}" />  

                  <div class="text-right">
                    <button type="submit" class="btn mt-5 btn-primary">新規作成</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection