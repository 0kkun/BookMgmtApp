
@extends('layout')

@section('content')
  <section>
    <div class="bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-4 text-center pt-2"><a class="text-white" href="#"><h5>Profile</h5></a></div>
          <div class="col-4 text-center pt-2"><a class="text-white" href="#"><h5>My Shelf</h5></a></div>
          <div class="col-4 text-center pt-2"><a class="text-white" href="#"><h5>Search</h5></a></div>
        </div>
      </div>
    </div>
  </section>

  <section class="new-edit-form bg-light">
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
        <div class="col-sm-9 pt-4">
          <div class="row">
            <div class="col-6 font-weight-bold text-right">
              <p class="pt-2">タイトル：</p>
              <p class="pt-1">カテゴリー：</p>
              <p class="pt-2">総巻数：</p>
            </div>
            <div class="col-6">
              <form action="{{ route('books.edit', ['id' => $book->book_id]) }}" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control mb-2" name="title" id="title" value="{{ old('title') ?? $book->title }}" />
                  <select class="form-control mb-2">
                    <option>ギャグ</option>
                    <option>ラブコメ</option>
                    <option>バトル</option>
                  </select>

                  <input type="text" class="form-control" name="book_volume" id="book_bolume" value="{{ old('book_volume') ?? $book->book_volume }}" />


                  <div class="text-right">
                    <!-- <button class="btn mt-5 btn-primary">新規作成</button> -->
                    <button  type="submit" class="btn mt-5 btn-success">編集保存</button>
                    <!-- <button class="btn mt-5 btn-danger">削除</button> -->
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