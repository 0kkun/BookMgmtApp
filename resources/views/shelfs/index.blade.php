
@extends('layout')

@section('content')
  <section class="bg-dark container-fluid">
    <div class="row text-center bg-dark">
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/users/{{ Auth::user()->id }}">Profile</a></div>
      <div class="col-4 pt-2 pb-2 bg-primary"><a class="text-white h5" href="/shelfs">My Shelf</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/books">Search</a></div>
    </div>
  </section>


  <!-- <section class="shelf bg-light">
    <form action="{{url('/shelfs')}}" method="GET">
      <div class="input-group  container-fluid pt-5 px-sm-5 search-box">
        <input type="text" class="form-control" name="keyword"  placeholder="タイトル名で検索">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default bg-dark text-white">検索</button>
        </span>
      </div>
    </form> -->


    <div class="bg-light text-center pt-5 pb-3 h6">
      <div class="container shelf-table mt-5">
      @if($myShelfs->count())
        <table class="table ">
          <thead>
            <tr>
              <th class="non title">タイトル</th>
              <th scope="point"> 評価</th>
              <th scope="amount"> 完了 / 総数</th>
              <th scope="status"> ステータス</th>
              <th scope="button"> 編集</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($myShelfs as $myShelf) 
            <tr>
              <th >{{ $myShelf->book->title }}</th>
              <td data-label="評価" class="txt text-center">{{ $myShelf->point}}</td>
              <td data-label="完了 / 総数" class="text-center">{{ $myShelf->finished_amount }} / {{$myShelf->book->book_volume}}</td>
              <td data-label="ステータス" class="text-center">{{ $myShelf->status_label }}</td>
              <td data-label="追加/編集" class="text-center"><a href="{{ route('shelfs.edit', ['id' => $myShelf->book_id, 'shelf_id' => $myShelf->id]) }}">編集</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>


        @else
        <p>本は登録されていません。</p>
        @endif
        {{ $myShelfs->links() }}
      </div>
    </div>
  </section>

@endsection