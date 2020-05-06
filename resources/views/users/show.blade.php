
@extends('layout')

@section('content')

  <section class="bg-dark container-fluid">
    <div class="row text-center bg-dark">
      <div class="col-4 pt-2 pb-2 bg-primary"><a class="text-white h5" href="/users/{{ Auth::user()->id }}">Profile</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/shelfs">My Shelf</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/books">Search</a></div>
    </div>
  </section>



  <section class="profile bg-light">
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
        <div class="col-sm-6 pt-5">
          <div class="no-image text-center bg-secondary text-white pt-5 display-4 mb-2 border rounded">
            No image
          </div>
          <!-- @if ($is_image)
            <figure>
              <img src="/storage/profile_images/{{ Auth::id() }}.jpg" width="280px" height="300px" class="border rounded-lg no-image" >
            </figure>
          @else
          <div class="no-image text-center bg-secondary text-white pt-5 display-4 mb-2 border rounded">
            No image
          </div>
          @endif

          <form method="POST" action="/users" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label class="btn btn-primary submit-label">
              プロフ画像選択
              <input type="file" name="photo">
            </label>
            <label class="btn btn-primary ml-3 submit-label">
              登録
              <input type="submit">
            </label>
          </form> -->

          <div class="pt-3 text-center">ユーザー名：{{ Auth::user()->name }} </div>
          
            <!-- <div class="pt-4 text-primary">フォロー：８ </div>
            <div class="text-primary">フォワー：16 </div> -->
        </div>
        <div class="col-sm-6 text-center pt-3">
          <span>あなたは・・・</span>
          <span class="h2">{{ $position }}！</span>

          <p class="pt-3 lead">読んだ本の累計： {{$sum}} 冊</p>

          <canvas id="myPieChart" class="pb-3"></canvas>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
          <script>
            var colorArray = <?php echo json_encode($colorArray); ?>;
            var genreArray = <?php echo json_encode($genre); ?>;
            var amountArray = <?php echo json_encode($amount); ?>;

            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
              type: 'pie',
              data: {
                labels: genreArray,
                datasets: [{
                    backgroundColor: colorArray,
                data: amountArray
                }]
              },
              options: {
                title: {
                  display: true,
                  text: 'ジャンル (Top 5)'
                }
              }
            });
          </script>
        </div>
      </div>
    </div>
  </section>
@endsection