
@extends('layout')

@section('content')
  <section>
    <div>
      <div class="row">
        <div class="col-4 text-center bg-primary pt-2"><a class="text-white" href="/users/{{$user->id}}"><h5>Profile</h5></a></div>
        <div class="col-4 text-center bg-dark pt-2"><a class="text-white" href="/shelfs"><h5>My Shelf</h5></a></div>
        <div class="col-4 text-center bg-dark pt-2"><a class="text-white" href="/books"><h5>Search</h5></a></div>
      </div>
    </div>
  </section>


  <section class="profile bg-light">
    <div class="row">
      <div class="col-sm-6 text-center">
        <img src="img/phone.png" class="profile-img mt-5 rounded-circle">
        <div class="pt-4">ユーザー名：{{ Auth::user()->name }} </div>
        
        <div class="pt-4 text-primary">フォロー：８ </div>
        <div class="text-primary">フォワー：16 </div>
      </div>
      <div class="col-sm-6 pt-3 text-center">
        <span>あなたは・・・</span>
        <span class="display-4">ガチオタ！</span>

        <p class="pt-3 lead">読んだ本の総数： 1,000 冊</p>

        <canvas id="myPieChart" class="pb-3"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        <script>
          var ctx = document.getElementById("myPieChart");
          var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: ["ギャグ", "ラブコメ", "ミステリー", "バトル"],
              datasets: [{
                  backgroundColor: [
                      "#BB5179",
                      "#FAFF67",
                      "#58A27C",
                      "#3C00FF"
                  ],
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