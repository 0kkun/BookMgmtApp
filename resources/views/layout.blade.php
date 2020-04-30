<!doctype html>
<html lang="ja">
  <head>
    <title>Book Management App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/styles.css">
  </head>
  <body>
    <div class="wrapper">
      <header>
        <div>
          <nav class="navbar navbar-expand-sm navbar-light float-right">
            <a href="" class="navbar-brand"></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu"> <!--data-target属性で開く物を指定-->
              <span class="navbar-toggler-icon"></span> <!-- ハンバーガーアイコンを作る  -->
            </button>
  
            <div id="menu" class="collapse navbar-collapse">
              <ul class="navbar-nav ">
                <li class="nav-item"><a href="" class="nav-link btn-dark text-white text-center ">新規登録</a></li>
                <li class="nav-item"><a href="" class="nav-link btn-dark text-white text-center ">ログイン</a></li>
                <li class="nav-item"><a href="" class="nav-link btn-dark text-white text-center ">ログアウト</a></li>
              </ul>
            </div>
          </nav>
  
          <div class="px-4 py-5">
            <a href="#" class="btn"> <h1 class="display-5 mb-4 text-white ">Book Management App</h1></a>
          </div>
        </div>
      </header>
      <main>
        @yield('content')
      </main>
    </div>

    <footer class="bg-dark text-center text-muted py-4">
      Copyright©shinji. All Rights Reserved.
    </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  </body>
</html>