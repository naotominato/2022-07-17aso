<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
  <title>お問い合わせ</title>
  @yield('resetcss')
  @livewireStyles
</head>
<style>
  .container {
    text-align: center;
    margin: 0 auto;
  }
</style>


<body>

  <div class="container">
    @yield('content')
  </div>

  @livewireScripts
</body>
<script>
  function toHalfWidth(elm) {
    elm.value = elm.value.replace(/[― ０-９！-～]/g, function(s) {
      return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
    });
  }
</script>

</html>