<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
    @yield('title','Laravel Ecommerce Project')
  </title>


  @include('frontend.partials.styles')
</head>
<body>

  <div class="wrapper">

    @include('frontend.partials.nav')
    @yield('content')
    @include('frontend.partials.footer')

  </div>


  @include('frontend.partials.scripts')
  </body>
</html>
