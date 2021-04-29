@extends('plantillas.principal')
@section('name','UDGOnline-'.$lesson->name)
@section('body')



<!-------------------------------------------->
@include('plantillas.secciones.nav')
<!-------------------------------------------->
<x-hero-clase name='{{ $lesson->name }}' nrc='{{ $lesson->nrc }}' cicle='{{ $lesson->cicle }}'
    image='{{ $lesson->image }}' />
<div class="contenedor-tareas">
    <div class="indice-tareas ">
        <div class="segmento-tarea">
            <legend>Indice</legend>
        </div>
        <div class="segmento-tarea">
            <!--------Aqui debe llevar una variable con el nombre del bloque #nombre--------->
            <a href="#bloque">Nombre del modulo</a>
        </div>
    </div>
    <!-------------------------------------------->
    <div class="tablon-tareas">
        <!--------Esto se repite por bloque--------->
        <div class="bloque-tarea" id="bloque">
            <div class="titulo-tarea">
                <h2 style="border-bottom: solid 1px; ">Nombre del Modulo</h2>
            </div>
            <div class="contenido-tarea">
                <x-tareas titulo="prueba" link="perfil" fecha="prueba" />
            </div>
        </div>

    </div>
    <!--------Esto se repite por bloque--------->
</div>
<!-------------------------------------------->

@endsection