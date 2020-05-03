

@extends('layout')

@section('content')
  <section>
    <div>
      <div class="row">
        <div class="col-4 text-center bg-dark pt-2"><a class="text-white" href="/users/{{ Auth::user()->id }}"><h5>Profile</h5></a></div>
        <div class="col-4 text-center bg-primary pt-2"><a class="text-white" href="/shelfs"><h5>My Shelf</h5></a></div>
        <div class="col-4 text-center pt-2 bg-dark"><a class="text-white" href="/books"><h5>Search</h5></a></div>
      </div>
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
    <h2 class="text-center text-primary p-4">本棚へ追加</h2>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 text-center">
          <img src="img/dragonball.jpg" class="book-img mb-5">
        </div>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-6 font-weight-bold text-right">
              <p>タイトル：</p>
              <p>カテゴリー：</p>
              <p>総数：</p>
              <p class="mb-4 mt-4">完了数：</p>
              <p class="mb-4">ステータス：</p>
              <p>評価点数：</p>
            </div>
            <div class="col-6">
              <div class="mb-3">{{ $book->title }}</div>
              <div class="mb-3">{{ $book->genre_label }}</div>
              <div class="mb-3">{{ $book->book_volume }} 冊</div>


              <form action="{{ route('shelfs.edit', ['id' => $shelf->book_id, 'shelf_id' => $shelf->id]) }}" method="POST">
                <div class="form-group">
                  @csrf
                  <input type="number" class="form-control mb-2" name="finished_amount" id="finished_amount" value="{{ old('finished_amount') ?? $shelf->finished_amount }}" />
                  <select name="status" id="status" class="form-control mb-2">
                    @foreach(\App\Shelf::STATUS as $key => $val)
                      <option value="{{$key}}" {{ $key == old('status', $shelf->status) ? 'selected' : '' }}>
                        {{ $val['label'] }}
                      </option>
                    @endforeach
                  </select>

                  <input type="number" class="form-control" name="point" id="point" value="{{ old('point') ?? $shelf->point }}" />

                  <div class="text-right">
                    <button type="submit" class="btn mt-5 btn-success">編集保存</button>
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