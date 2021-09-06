<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stream {{ $code }}</title>
</head>
<body>
    <button onclick="getMedia();">Start</button>
    <script>
        var baseUrl = "{!! url('') !!}";
        var csrf = "{!! csrf_token() !!}";
        var streamId = "{{ $code }}";
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/client.js')}}"></script>
</body>
</html>