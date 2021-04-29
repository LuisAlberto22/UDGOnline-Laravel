<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="description" content="Pagina de educacion en linea de la UDG">
	<meta name="keywords" content="UDG,udg,stream,clases online,streaming">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> @yield('name') </title>
	<link rel="icon" href="{{asset('img/Leon.png')}}" type="image/x-icon" />
	<link rel="preload" href="{{ URL::asset('css/normalize.css') }}" as="style">
	<link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
	<link rel="preload" href="{{ URL::asset('css/styles.css') }}" as="style">
	<link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
	@include('plantillas.secciones.header')
    @include('plantillas.secciones.aside')
    @yield('body')
</body>
</html>