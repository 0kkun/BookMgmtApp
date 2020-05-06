

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
    <h2 class="text-center text-primary p-4">本棚へ追加</h2>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 text-center">
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
          @endif -->
        </div>



        <div class="col-sm-9">
          <div class="row">
            <div class="col-6 font-weight-bold text-right">
              <p>タイトル：</p>
              <p>カテゴリー：</p>
              <p>最新巻：</p>
              <p class="mb-4 mt-4">何巻まで読み終わったか：</p>
              <p class="mb-4">ステータス：</p>
              <p>100点中の評価点：</p>
            </div>
            <div class="col-6">
              <div class="mb-3">{{ $book->title }}</div>
              <div class="mb-3">{{ $book->genre_label }}</div>
              <div class="mb-3">{{ $book->book_volume }} 冊</div>


              <form action="{{ route('shelfs.create', ['id' => $book_id]) }}" method="POST">
                <div class="form-group">
                  @csrf
                  <input type="number" class="form-control mb-2" name="finished_amount" id="finished_amount" value="{{ old('finished_amount') }}" />
                  <select name="status" id="status" class="form-control mb-2">
                    @foreach(\App\Shelf::STATUS as $key => $val)
                      <option value="{{$key}}">
                        {{ $val['label'] }}
                      </option>
                    @endforeach
                  </select>

                  <input type="number" class="form-control" name="point" id="point" value="{{ old('point') }} " />

                  <input type="hidden" class="form-control" name="book_id" id="book_id" value="{{ $book_id }}"/>
                  <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/>

                  <div class="text-right">
                    <button type="submit" class="btn mt-5 btn-success">登録</button>
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