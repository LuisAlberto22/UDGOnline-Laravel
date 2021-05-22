@extends('plantillas.principal')
@section('name', 'UDGOnline-' . $lesson->name)

    <head>
        <link rel="stylesheet" href="{{ asset('css/video.css') }}">
    </head>
    
@section('body')
    @include('plantillas.secciones.nav')

    <div class="contenedor-videos">
        <div>
            <div class="heading text-center font-bold text-2xl m-5 text-black-100">
                <p>Videos de la clase</p>
                @isset($videos)
                    @foreach ($videos->videos as $video)
                        <x-video video="{{ $video->id }}" />
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
@endsection
