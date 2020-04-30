
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

  <section class="shelf bg-light">

    <div class="input-group container pt-5 px-5 w-75">
      <input type="text" class="form-control" placeholder="テキスト入力欄">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default bg-dark text-white">検索</button>
      </span>
    </div>

    <div class="bg-light text-center py-5">
      <div class="container shelf-table">
        <table class="table table-hover table-striped ">
          <thead>
            <tr>
              <th>追加</th><th>タイトル</th><th>カテゴリー</th><th>総巻数</th><th>編集</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><button class="btn-sm btn-primary">追加</button></td>
              <td>ドラゴンボール</td>
              <td>バトル</td>
              <td>42巻</td>     
              <td><a href="#">編集</a></td>
            </tr>
            <tr>
              <td><button class="btn-sm btn-primary">追加</button></td>
              <td>鬼滅の刃</td>
              <td>バトル</td>
              <td>42巻</td>   
              <td><a href="#">編集</a></td>
            </tr>
            <tr>
              <td><button class="btn-sm btn-primary">追加</button></td>
              <td>NARUTO</td>
              <td>バトル</td>
              <td>42巻</td>   
              <td><a href="#">編集</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection