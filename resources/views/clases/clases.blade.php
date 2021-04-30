@extends('plantillas.principal')

@section('name', 'UDGOnline-Clases')
@section('body')

    @foreach ($lessons as $lesson)
        <x-clases-component nrc='{{$lesson->nrc}}' image='{{$lesson->image}}' name='{{$lesson->name}}' teacher='{{$lesson->user_id}}' />
    @endforeach

@endsection
