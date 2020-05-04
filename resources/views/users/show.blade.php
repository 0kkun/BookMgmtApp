
@extends('layout')

@section('content')

  <section class="bg-dark container-fluid">
    <div class="row text-center bg-dark">
      <div class="col-4 pt-2 pb-2 bg-primary"><a class="text-white h5" href="/users/{{ Auth::user()->id }}">Profile</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/shelfs">My Shelf</a></div>
      <div class="col-4 pt-2 pb-2"><a class="text-white h5" href="/books">Search</a></div>
    </div>
  </section>


  <section class="profile bg-light container-fluid">
    <div class="row">
      <div class="col-sm-6 text-center">
        <img src="img/phone.png" class="profile-img mt-5 rounded-circle">
        <div class="pt-4">ユーザー名：{{ Auth::user()->name }} </div>
        
        <div class="pt-4 text-primary">フォロー：８ </div>
        <div class="text-primary">フォワー：16 </div>
      </div>
      <div class="col-sm-6 text-center">
        <span>あなたは・・・</span>
        <span class="display-4">{{ $position }}！</span>

        <p class="pt-3 lead">読んだ本の総数： {{$sum}} 冊</p>


        <canvas id="myPieChart" class="pb-3"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        <script>
          var colorArray = <?php echo json_encode($colorArray); ?>;
          // console.log(colorArray);

          var ctx = document.getElementById("myPieChart");
          var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: ["ギャグ", "ラブコメ", "ミステリー", "バトル"],
              datasets: [{
                  backgroundColor: colorArray,
              data: [38, 31, 21, 10]
              }]
            },
            options: {
              title: {
                display: true,
                text: 'カテゴリー'
              }
            }
          });
          </script>

      </div>
    </div>
  </section>
@endsection