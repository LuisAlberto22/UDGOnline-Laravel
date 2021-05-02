@extends('plantillas.principal')
@section('name', 'UDGOnline-' . $lesson->name)
@section('body')

    @include('plantillas.secciones.nav')
    <x-hero-clase name='{{ $lesson->name }}' nrc='{{ $lesson->nrc }}' cicle='{{ $lesson->cicle }}'
        image='{{ $lesson->image }}' />
    <x-modal-post />
    @foreach ($posts as $post)
      <x-comentario title='{{$post->name}}' description='{{$post->body}}' date="{{$post->created_at}}" user='{{$post->user->name}}' img="{{$post->user->image}}"/>
    @endforeach
   

@endsection
