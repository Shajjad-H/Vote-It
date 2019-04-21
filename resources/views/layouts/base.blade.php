<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('titre')</title>
  @yield('css_lib')
  @yield('css')
</head>
<body>

  @yield('header')
  @yield('content')
  @yield('footer')
  
  @yield('js_lib')
  @yield('js')
</body>
</html>