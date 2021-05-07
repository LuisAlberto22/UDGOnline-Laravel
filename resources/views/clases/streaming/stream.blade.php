@extends('plantillas.principal')

@section('name', 'UDGOnline-Streaming')

@section('body')
    @include('plantillas.secciones.nav')
        <iframe allow="camera; microphone; fullscreen; display-capture; autoplay" src="https://meet.udgonline.com/prueba"
        style="height: 540px; width: 100%; border: 0px;"></iframe> 
        {{-- <iframe allow="camera; microphone; fullscreen; display-capture; autoplay" src="https://meet.jit.si/HumanitarianDismissalsTransformSeamlessly" style="height: 540px; width: 100%; border: 0px;"></iframe> --}}
@endsection
