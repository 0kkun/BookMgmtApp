
@extends('layout')

@section('content')
  <section class="bg-dark container-fluid">
    <div class="row text-center bg-dark">
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/users/{{ Auth::user()->id }}">Profile</a></div>
      <div class="col-4 pt-2 pb-2 bg-primary"><a class="text-white h5" href="/shelfs">My Shelf</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/books">Search</a></div>
    </div>
  </section>


  <section class="shelf bg-light">
    <div class="input-group  container-fluid pt-5 px-sm-5 search-box">
      <input type="text" class="form-control" placeholder="テキスト入力欄">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default bg-dark text-white">検索</button>
      </span>
    </div>

    <div class="bg-light text-center pt-4 pb-3">
      <div class="container shelf-table">
        <table class="table table-hover table-striped">

          <!-- $comment->post->title; -->
          <thead>
            <tr class= "bg-secondary text-white" >
              <th>タイトル</th>
              <th>評価</th>
              <th>完了 / 総数</th>
              <th>ステータス</th>
              <th>編集</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($shelfs as $shelf) 
            <tr>
              <td>{{ $shelf->book->title }}</td>
              <td>{{ $shelf->point}}</td>
              <td>{{ $shelf->finished_amount }} / {{$shelf->book->book_volume}}</td>
              <td>{{ $shelf->status_label }}</td>
              <td><a href="{{ route('shelfs.edit', ['id' => $shelf->book_id, 'shelf_id' => $shelf->id]) }}">編集</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $shelfs->links() }}
      </div>
    </div>
  </section>

@endsection