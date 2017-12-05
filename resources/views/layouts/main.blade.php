<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials._head')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div id="app">
		@yield ('content')
	</div>
	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>