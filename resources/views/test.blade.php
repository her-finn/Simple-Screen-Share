<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="getMedia();">
    <style>
        #outgoing {
          width: 600px;
          word-wrap: break-word;
          white-space: normal;
        }
      </style>
      <form>
        <textarea id="incoming"></textarea>
        <button type="submit">submit</button>
      </form>
      <pre id="outgoing"></pre>
      <div id="code"></div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js" integrity="sha512-NFUcDlm4V+a2sjPX7gREIXgCSFja9cHtKPOL1zj6QhnE0vcY695MODehqkaGYTLyL2wxe/wtr4Z49SvqXq12UQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/test.js')}}"></script>
</body>
</html>  