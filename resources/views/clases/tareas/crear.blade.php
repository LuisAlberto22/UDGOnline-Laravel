@extends('plantillas.principal')
@section('name','UDGOnline-CrearTarea')
@section('body')
<!-- Include the default stylesheet -->


    @include('plantillas.secciones.nav')
 

    <div class="h-full p-6 bg-white-500 sombra1" style="margin: 1rem;">
   
        <form method="POST" enctype="multipart/form-data" action="{{route('clases.tareas.store' , $lesson)}}">
            @csrf
            <div class="mb-4">
                <label class="text-xl text-gray-600">Titulo <span class="text-red-500">*</span></label></br>
                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="title" value="" required></input>
            </div>
            @error("name")
                {{ $message }}
            @enderror

            <div class="mb-8">
                <label class="text-xl  text-gray-600">Contenido <span class="text-red-500">*</span></label></br>
                <textarea name="description" placeholder="(Opcional)" class="border-2  w-full h-48 border-gray-500"></textarea>
            </div>
            @error("description")
            {{ $message }}
        @enderror
            <div style="display: flex; align-items: center;">
                <p style=" margin-right: 2rem;">Añadir Archivo</p>
                <input type="file" name="files[]" multiple >
            </div>
            @error("files")
            {{ $message }}
        @enderror
            <div style="margin-top: .5rem;">
                <input type="checkbox" onchange="toggle(start)">
                <span>Fecha de Entrega: </span>
                <input class="bg-gray-300 " disabled width="3rem" type="datetime-local" id="start" name="delivery_date" >
            </div>
            <div style="display: colum; align-items: center;">
                   @foreach ($users as $user)
                        <input type ="checkbox" checked name="users[]" value="{{$user->id}}">{{$user->name}}</input>
                   @endforeach
            </div>

            <div style="direction: rtl;">
                <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Crear</button>
            </div>
        </form>
    </div>

    <script>
        function toggle(e){
            e.toggleAttribute('disabled');
        }
    </script>
@endsection