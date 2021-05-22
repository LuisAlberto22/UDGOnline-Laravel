@extends('plantillas.principal')

@section('name', 'UDGOnline-Clases')
@section('body')

    <center>
        <legend style="padding: .5rem; background-color: #c8c8c8; border-radius: .5rem;"> Mis Clases</legend>
    </center>
    @foreach ($lessons as $lesson)
        <x-clases-component nrc='{{ $lesson->nrc }}' image='{{ $lesson->image }}' name='{{ $lesson->name }}'
            teacher='{{ $lesson->user_id }}' />
    @endforeach

@endsection
