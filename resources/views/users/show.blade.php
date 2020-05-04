
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
  </section>
@endsection