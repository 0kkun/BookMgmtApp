

@extends('layout')

@section('content')
  <section class="bg-dark container-fluid">
    <div class="row text-center bg-dark">
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/users/{{ Auth::user()->id }}">Profile</a></div>
      <div class="col-4 pt-2 pb-2 bg-primary"><a class="text-white h5" href="/shelfs">My Shelf</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/books">Search</a></div>
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
    <h2 class="text-center text-primary pt-4">本棚へ追加</h2>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 text-center">
          @if ($is_image)
            <figure>
              <img src="/storage/book_images/{{ $book->id }}.jpg" width="280px" height="300px" class="border rounded">
            </figure>
          @else
            <div class="no-image text-center bg-secondary text-white pt-5 display-4 mb-2 border rounded">
              No image
            </div>
          @endif
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

                  <div class="text-right mb-2">
                    <button type="submit" class="btn mt-5 btn-success">編集保存</button>
                  </div>
                </div>
              </form>
              <div class="text-right">
                    <form method="post" action="/shelf/delete/{{$shelf->id}}">
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