<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Stream</title>
</head>
<body>
    <video src="{{ asset('video/pexels-artem-podrez-7234462.mp4') }}" id="tmpVideo" style="heigth: 1px; width: 1px;" autoplay muted hidecontrols></video>
    <button onclick="newStream();">Starten</button>
    <script>
        var baseUrl = "{!! url('') !!}";
        var csrf = "{!! csrf_token() !!}"
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>