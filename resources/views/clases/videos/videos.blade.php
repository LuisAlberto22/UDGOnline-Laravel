@extends('plantillas.principal')
@section('name','UDGOnline-'.$lesson->name)

<head>
    <link rel="stylesheet" href="{{asset('css/video.css')}}">
</head>
@section('body')
<body>
<div class="contenedor-principal">
    <div class="contenedor-index" style="display: block;">
        <!-------------------------------------------->
        @include('plantillas.secciones.nav')
        <!-------------------------------------------->
        <div style="display: flex; justify-content: center; margin-top: 1rem;">
            <legend></legend>
        </div>
        <div class="contenedor-videos">
            <x-video descripcion="Capitulo 1" nombre="Minecraft" link="https://i.ytimg.com/vi/1eZ24pq3W6U/maxresdefault.jpg"/>
        </div>
    </div>
</div>
@endsection