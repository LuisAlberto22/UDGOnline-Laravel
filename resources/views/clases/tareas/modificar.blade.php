@extends('plantillas.principal')
@section('name', 'UDGOnline-CrearTarea')
@section('body')
    <!-- Include the default stylesheet -->


    @include('plantillas.secciones.nav')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function() {
            $("#test").CreateMultiCheckBox({
                width: '230px',
                defaultText: 'Seleccionar Alumnos',
                height: '250px'
            });
        });

    </script>
    <style>
        .boton-cerrar {
            padding: 3px;
        }

        .boton-cerrar:hover {
            cursor: pointer;
        }

    </style>
    <div class="h-full p-6 bg-white-500 sombra1" style="margin: 1rem;">
        <p class="text-center font-bold text-2xl m-5 text-black-100"
            style="background-color: #c8c8c8; border-radius: 5px; padding: 5px;"> Modificar tarea</p>
        <form method="POST" enctype="multipart/form-data"
            action="{{ route('clases.tareas.update', [$lesson, $homework]) }}">
            @csrf
            @method('put')
            <div class="mb-4">
                <label class="text-xl text-gray-600">Título <span class="text-red-500">*</span></label></br>
                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="title"
                    value="{{ $homework->name }}" required></input>
            </div>
            @error('name')
                {{ $message }}
            @enderror

            <div class="mb-8">
                <label class="text-xl  text-gray-600">Contenido <span class="text-red-500">*</span></label></br>
                <textarea name="description" placeholder="(Opcional)"
                    class="border-2  w-full h-48 border-gray-500">{{ $homework->description }}</textarea>
            </div>
            @error('description')
                {{ $message }}
            @enderror
            <div style="display: flex; align-items: center;">
                <p style=" margin-right: 2rem;">Añadir archivos</p>
                <input type="file" name="files[]" multiple>
            </div>
            @error('files')
                {{ $message }}
            @enderror
            <div style="margin-top: .5rem;">
                @isset($homework->delivery_date)
                    <input type="checkbox" checked onchange="toggle(start)">
                    <span>Fecha de entrega: </span>
                    <input class="bg-gray-300 " width="3rem" type="datetime-local" min="{{ date('Y-m-d\TH:i:s', strtotime($homework->delivery_date)) }}"
                        value="{{ date('Y-m-d\TH:i:s', strtotime($homework->delivery_date)) }}" id="start"
                        name="delivery_date">
                @else
                    <input type="checkbox" onchange="toggle(start)">
                    <span>Fecha de entrega: </span>
                    <input class="bg-gray-300 " width="3rem" disabled type="datetime-local" min="{{ date('Y-m-d\TH:i:s') }}"
                        value="{{ date('Y-m-d\TH:i:s') }}" id="start" name="delivery_date">

                @endisset
            </div>
            @error('delivery_date')
                {{$message}}
            @enderror
            <div style="display: colum; align-items: center;">
                @foreach ($users as $user)
                    <input type="checkbox" @if ($homework->users()->find($user->id) != null) checked @endif name="users[]"
                        value="{{ $user->id }}">{{ $user->name }}</input>
                @endforeach
                @error('users')
                    {{ $message }}
                @enderror
            </div>
            <div style="direction: rtl;">
                <button
                    class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Modificar</button>
            </div>
        </form>
        <div style="display: inline-block;">
            @foreach ($homework->files as $file)
                <div style="float: left;">
                    <form action="{{ route('clases.tareas.archivo.destroy', [$lesson, $homework, $file]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="#" onclick="this.closest('form').submit()"
                            style="display: inline-block; margin-top: 8px; margin-left: -13px;"
                            class="bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white boton-cerrar">
                            &cross;
                        </a>
                        <div style="float:left; margin-top: 2rem; margin-left: 1rem; margin-bottom: 1rem; "
                            class="download sombra2">
                            <a href="{{ route('file.download', $file) }}">
                                <div style="display: flex; align-items: center; ">
                                    <img style="width: 32px;" src="{{ Asset('img/Leon.png') }}">
                                    <div>
                                        <p>Descargar</p>
                                        <p
                                            style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">
                                            {{ $file->name }}
                                        </p>
                                        <p
                                            style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">
                                            Extensióón: {{ $file->type }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

    </div>

    <script>
        function toggle(e) {
            e.toggleAttribute('disabled');
        }

    </script>


@endsection
