@extends('plantillas.principal')
@section('name', 'UDGOnline-' . $lesson->name)
@section('body')



    <!-------------------------------------------->
    @include('plantillas.secciones.nav')
    <!-------------------------------------------->
    <x-lesson-banner-component name='{{ $lesson->name }}' nrc='{{ $lesson->nrc }}' image='{{ $lesson->image }}'
        id="{{ $lesson->id }}" />
    <div class="contenedor-tareas">
        <div class="indice-tareas ">
            @can('clases.tareas.create')
                <a href="{{ route('clases.tareas.create', $lesson) }}"
                    class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-white focus:outline-none">
                    Crear Tarea
                </a>
            @endcan

        </div>
        <!-------------------------------------------->
        <div class="tablon-tareas">
            <!--------Esto se repite por bloque--------->
            @if (session('info'))
                <div class="bg-indigo-900 text-center py-4 lg:px-4">
                    <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                        role="alert">
                        <span
                            class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Nuevo</span>
                        <span class="font-semibold mr-2 text-left flex-auto">{{ session('info') }}</span>
                        <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                        </svg>
                    </div>
                </div>
            @endif
            <div class="bloque-tarea" id="bloque">
                <div class="titulo-tarea">
                    <h2 style="border-bottom: solid 1px; ">Asignaciones</h2>
                </div>

                <div class="contenido-tarea">

                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Titulo
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Descripcion
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha De Entrega:
                                                </th>
                                                @if (auth()->user()->hasRole('Alumno'))
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Estado:
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Calificacion:
                                                    </th>
                                                @endif
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        @isset($homeworks)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($homeworks as $homework)
                                                    <x-students-homework-component image="{{ Asset('img/homework.png') }}"
                                                        status="{{ auth()->user()->hasRole('Alumno')
    ? $homework->pivot->status
    : null }}"
                                                        score="{{ auth()->user()->hasRole('Alumno')
    ? $homework->pivot->score
    : null }}"
                                                        name="{{ $homework->name }}"
                                                        description="{{ $homework->description }}"
                                                        date="{{ $homework->delivery_date }}" id="{{ $homework->slug }}"
                                                        lesson="{{ $lesson->nrc }}" />
                                                @endforeach

                                            </tbody>
                                        @else
                                            <h1>No hay tareas Registradas</h1>
                                        @endisset
                                    </table>
                                    {{ $homeworks->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--------Esto se repite por bloque--------->
    </div>
    <!-------------------------------------------->

@endsection
