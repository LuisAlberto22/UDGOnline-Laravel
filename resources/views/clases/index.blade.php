@extends('plantillas.principal')
@section('name', 'UDGOnline-' . $lesson->name)
@section('body')

    @include('plantillas.secciones.nav')
    <x-hero-clase name='{{ $lesson->name }}' nrc='{{ $lesson->nrc }}' cicle='{{ $lesson->cicle }}'
        image='{{ $lesson->image }}' />
    <x-modal-post />
    @foreach ($posts as $post)
        {{ $post->body }}
    @endforeach
    <x-comentario />


@endsection
