<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Stream {{ $code }}</title>
</head>
<body>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
          <div class="inner">
            <h3 class="masthead-brand">Easy Screen Share</h3>
            <nav class="nav nav-masthead justify-content-center">
              <a class="nav-link" href="https://10.8.0.11/new">Your Screen as reciever</a>
            </nav>
          </div>
        </header>
  
        <main role="main" class="inner cover onlyPc" id="streamId">
          <h1 class="cover-heading" style="width: 130%;">Share your Screen</h1><br><br>
          <p class="lead text-center" style="text-align: center!important;">
            <button class="btn btn-lg btn-outline-primary" onclick="getMedia();" style="font-size: 1.5em;" id="newStreamBtn">Share</button>
          </p>
        </main> 
        <h1 class="onlyMobile text-warning" style="display: none;">This Page is only available on PC</h1>
        <footer class="mastfoot mt-auto">
          <div class="inner" >
            <p>Easy Screen Share by <a href="https://github.com/her-finn">her-finn</a> <br>
            <span class="font-size: 10px!important;">Template by <a href="https://twitter.com/mdo">@mdo</a>.</span></p>
          </div>
        </footer>
    </div>
    <script>
        var baseUrl = "{!! url('') !!}";
        var csrf = "{!! csrf_token() !!}";
        var streamId = "{{ $code }}";
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/client.js')}}"></script>
</body>
</html>