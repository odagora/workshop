<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
    @include('partials._login')
  </head>
  <body>
    <div class="container"> 
      @yield ('content')
    </div> <!-- End of .container -->
    @include('partials._javascript')
    <!-- Loads specific styles for each page -->
    @yield ('scripts')
  </body>
</html>