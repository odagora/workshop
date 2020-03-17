<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Workshop App @yield('title')</title>
<!--- CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Custom Styles -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Font awesome icons library-->
<script src="https://kit.fontawesome.com/f894ec0804.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/go-top-button.css')}}">

<!-- Loads specific styles for each page -->
@yield ('stylesheets')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
