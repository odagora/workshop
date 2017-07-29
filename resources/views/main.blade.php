<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>
  <body>
  @include('partials._nav')
    <div class="container"> 
      @yield ('content')
      @include('partials._footer')
    </div> <!-- End of .container -->
    @include('partials._javascript')
    <!-- Loads specific styles for each page -->
    @yield ('scripts')
  </body>
</html>