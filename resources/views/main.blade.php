<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    @include('partials._head')
    @include('partials._signature')
  </head>
  <body>
    @include('partials._nav')
    <div class="container">
      <!-- Loads session messages before all content-->
      @include('partials._messages')

      @yield ('content')
      @include('partials._footer')
    </div> <!-- End of .container -->
    @include('partials._javascript')
    <!-- Loads specific styles for each page -->
    @yield ('scripts')
  </body>
</html>