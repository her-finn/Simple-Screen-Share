<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/start.css')}}">

    <title>Easy Screen Share</title>
</head>
<body>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
          <div class="inner">
            <h3 class="masthead-brand">Easy Screen Share</h3>
            <nav class="nav nav-masthead justify-content-center">
              <a class="nav-link" href="{{url('/new')}}">Your Screen as reciever</a>
            </nav>
          </div>
        </header>
  
        <main role="main" class="inner cover onlyPc">
          <h1 class="cover-heading">Please enter your Stream-ID:</h1><br><br>
            <p class="lead text-center">
                <form method="get" class="digit-group text-center" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                    <input type="text" id="digit-1" name="digit-1" data-next="digit-2" autofocus>
                    <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1">
                    <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2">
                    <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3">
                    <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4">
                    <input type="text" id="digit-6" name="digit-6" data-next="digit-7" data-previous="digit-5" onkeyup="checkStreamId();">
                </form><br>
                <p class="text-center text-danger" id="errorOut" style='system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"!important'></p>
            </p>
          <!--p class="lead">
            <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
          </p-->
        </main>
        <h1 class="onlyMobile text-warning" style="display: none;">This Page is only available on PC</h1>
        <footer class="mastfoot mt-auto">
          <div class="inner">
            <p>Easy Screen Share by <a href="https://github.com/her-finn">her-finn</a> <br>
            <span class="font-size: 10px!important;">Template by <a href="https://twitter.com/mdo">@mdo</a>.</span></p>
          </div>
        </footer>
      </div>
    <script>
        var baseUrl = "{!! url('') !!}";
        var csrf = "{!! csrf_token() !!}"
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/start.js')}}"></script>
</body>
</html>