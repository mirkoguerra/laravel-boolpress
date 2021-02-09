<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PER LA VISUALIZZAZIONE -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- PER IL MIO CSS -->

  </head>
  <body>

    @include('common.header')

    @yield('content')

  </body>
</html>
