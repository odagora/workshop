<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    @include('partials._head')
    @include('partials._signature')
  </head>
  <body class="body-pdf">
    <div class="container"> 
      @yield ('content')
    </div> <!-- End of .container -->
    @include('partials._javascript')
    <!-- Loads specific styles for each page -->
    @yield ('scripts')
  </body>
</html>