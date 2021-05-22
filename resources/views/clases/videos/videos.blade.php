@extends('plantillas.principal')
@section('name','UDGOnline-'.$lesson->name)

<head>
    <link rel="stylesheet" href="{{asset('css/video.css')}}">
</head>
@section('body')
@include('plantillas.secciones.nav')

<div class="contenedor-videos">
    <div>     
        <div class="heading text-center font-bold text-2xl m-5 text-black-100">
        <p>Videos de la clase</p>
            <x-video description="Descripcion simple" image="default/leon.png" lesson="{{$lesson->nrc}}" name="Minecraft" link="https://i.ytimg.com/vi/1eZ24pq3W6U/maxresdefault.jpg" />
            @foreach ($videos as $video)
            @endforeach
        </div>
    </div>
</div>
@endsection