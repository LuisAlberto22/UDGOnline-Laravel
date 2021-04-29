@extends('plantillas.principal')

@section('name', 'UDGOnline-Clases')
@section('body')

    @foreach ($lessons as $lesson)
        <x-clases-component nrc='{{$lesson->nrc}}' name='{{$lesson->name}}' cicle='{{$lesson->cicle}}' teacher='{{$lesson->user_id}}' />
    @endforeach

@endsection
