@extends('plantillas.principal')
@section('name','UDGOnline-'.$lesson->name)
@section('body')
<body>

<div class="contenedor-principal">
    <div class="contenedor-index" style="display: block;">
        <!-------------------------------------------->
        @include('plantillas.secciones.nav')
        <!-------------------------------------------->
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
                        <x-tareas titulo="prueba" link="perfil" fecha="prueba"/>
                    </div>
                </div>

            </div>
            <!--------Esto se repite por bloque--------->
        </div>
        <!-------------------------------------------->
    </div>
</div>
</div>
</div>
</body>
@endsection