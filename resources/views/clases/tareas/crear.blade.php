@extends('plantillas.principal')
@section('name','videos')
@section('body')
<body>
     <a style="margin-left: 2rem; margin-top: 1rem; width: 10rem;" class="segmento-tarea" href="javascript:history.back()"> Volver Atrás</a>
    <form class="crear-tarea-opc" action="">
        <input name="titulo" class="tarea-input" style="height: 4rem;" type="text" placeholder="Titulo"></input>
        <input name="descripcion" class="tarea-input" style="height: 10rem;" type="text" placeholder="Descripcion (opccional)">
        <div style="margin-top: .5rem;">
            <label for="start">Fecha de Entrega:</label>
            <input width="3rem" type="date" id="start" name="fecha" value="2021-03-30" min="2021-01-01" max="2030-12-31">
        </div>
        <div style="display: flex; align-items: center;">
        <p style=" margin-right: 2rem;">Añadir Archivo</p>
        <input type="file" multiple>
        </div>
       
        <button class="boton-tarea">Crear Tarea</button>


    </form>
</body>
@endsection