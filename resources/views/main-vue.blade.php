<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    @include('partials._head')
    @include('partials._signature')
  </head>
  <body>
    @include('partials._nav-vue')
    <div class="container" id="app">
      <!-- Loads session messages before all content-->
      @include('partials._messages')

      @yield ('content')
      @include('partials._footer')
    </div> <!-- End of .container -->
    @include('partials._vue')
    <!-- Loads specific styles for each page -->
    @yield ('scripts')
  </body>
</html>