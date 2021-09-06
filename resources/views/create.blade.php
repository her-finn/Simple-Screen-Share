<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Stream</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
  
        <main role="main" class="inner cover" id="streamId">
          <h1 class="cover-heading">Start new Screen Share</h1><br><br>
          <p class="lead text-center" style="text-align: center!important;">
            <button class="btn btn-lg btn-outline-primary" onclick="newStream();" style="font-size: 1.5em;" id="newStreamBtn">Start</button>
          </p>
        </main> 
  
        <footer class="mastfoot mt-auto">
          <div class="inner" >
            <p>Easy Screen Share by <a href="https://github.com/her-finn">her-finn</a> <br>
            <span class="font-size: 10px!important;">Template by <a href="https://twitter.com/mdo">@mdo</a>.</span></p>
          </div>
        </footer>
    </div>
    <video src="{{ asset('video/pexels-artem-podrez-7234462.mp4') }}" id="tmpVideo" style="heigth: 1px; width: 1px;" autoplay muted hidecontrols></video>
    <script>
        var baseUrl = "{!! url('') !!}";
        var csrf = "{!! csrf_token() !!}"
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>