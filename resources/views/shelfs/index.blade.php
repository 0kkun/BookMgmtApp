
@extends('layout')

@section('content')
  <section>
    <div>
      <div class="row">
        <div class="col-4 text-center bg-dark pt-2"><a class="text-white" href="/users/{{ Auth::user()->id }}"><h5>Profile</h5></a></div>
        <div class="col-4 text-center  bg-primary pt-2"><a class="text-white" href="#"><h5>My Shelf</h5></a></div>
        <div class="col-4 text-center bg-dark pt-2"><a class="text-white" href="/books"><h5>Search</h5></a></div>
      </div>
    </div>
  </section>


  <section class="shelf bg-light">
    <div class="input-group container pt-5 px-5 w-75">
      <input type="text" class="form-control" placeholder="テキスト入力欄">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default bg-dark text-white">検索</button>
      </span>
    </div>

    <div class="bg-light text-center py-5">
      <div class="container shelf-table">
        <table class="table table-hover table-striped">

          @foreach ($shelfs as $shelf) {
            {{ $shelf->book->title }}
          }@endforeach

          <!-- $comment->post->title; -->
          <thead>
            <tr>
              <th>タイトル</th><th>ステータス</th><th>編集</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($shelfs as $shelf) {
            <tr>
              <td>{{ $shelf->book->title }}</td>
              <td>{{ $shelf->status}}</td>
              <td><a href="#">編集</a></td>
            </tr>
          @endforeach
            <tr>
              <td>鬼滅の刃</td>
              <td>これから読みたい</td>
              <td><a href="#">編集</a></td>
            </tr>
            <tr>
              <td>NARUTO</td>
              <td>読んでいる途中</td>
              <td><a href="#">編集</a></td>
            </tr>
            <tr>
              <td>ワンピース</td>
              <td>読んでいる途中</td>
              <td><a href="#">編集</a></td>
            </tr>
            <tr>
              <td>タッチ</td>
              <td>読み終わった</td>
              <td><a href="#">編集</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

@endsection