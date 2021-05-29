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
                    Crear tarea
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
                                                    Título
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Descripción
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha de entrega:
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha de asignación:
                                                </th>
                                                @if (auth()->user()->hasRole('Alumno'))
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Estado:
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Calificación:
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
                                                    <div>
                                                        <div class="sombra1">
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="flex-shrink-0 h-10 w-10">
                                                                            <img class="h-10 w-10 rounded-full"
                                                                                src="{{ Asset('img/homework.png') }}" alt="">
                                                                        </div>
                                                                        <div class="ml-4">
                                                                            <div class="text-s font-medium text-gray-900">
                                                                                {{ $homework->name }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="item  py-6" x-data="{isOpen : false}">
                                                                        <a href="#" class="flex items-center justify-between"
                                                                            @click.prevent="isOpen = true">
                                                                            <h4 style="font-weight: 900;"
                                                                                :class="{'text-blue-600 font-bold' : isOpen == true}">
                                                                                {{ $homework->name }}
                                                                            </h4>
                                                                            <svg class="w-5 h-5 text-black-500" fill="none"
                                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path d="M19 9l-7 7-7-7"></path>
                                                                            </svg>
                                                                        </a>
                                                                        <div style="font-size: small ;" x-show="isOpen"
                                                                            @click.away="isOpen = false" class="mt-3"
                                                                            :class="{'text-black-600' : isOpen == true}">
                                                                            <div class="text-s text-gray-900">
                                                                                {{ $homework->description }}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                                    @isset($homework->delivery_date)
                                                                        {{ date('d/m/Y h:i A', strtotime($homework->delivery_date)) }}
                                                                    @else
                                                                        Sin fecha
                                                                    @endisset
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                                    {{ date('d/m/Y h:i A', strtotime($homework->updated_at)) }}
                                                                </td>
                                                                @if (auth()->user()->hasRole('Alumno'))
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                                        {{ $homework->pivot->status }}
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                                        {{ $homework->pivot->score }}
                                                                    </td>
                                                                @endif
                                                                @can('clases.tareas.edit')
                                                                    
                                                                <td
                                                                class="px-6 py-4 whitespace-nowrap text-right text-s font-medium">
                                                                <a href="{{ route('clases.tareas.edit', [$lesson, $homework]) }}" class="text-indigo-600 hover:text-indigo-900">Modificar</a>
                                                            </td>
                                                            @endcan
                                                            <div id="modal_overlay"
                                                           

                                                        </div>
                                                        @can('clases.tareas.destroy')
                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-s font-medium">
                                                                <form method="POST"
                                                                    action="{{ route('clases.tareas.destroy', [$lesson, $homework]) }}"
                                                                    class="text-indigo-600 hover:text-indigo-900">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <a href="#" onclick="this.closest('form').submit()">Eliminar</a>
                                                                </form>
                                                            </td>
                                                        @endcan
                                                        <td class="px-6 py-4 whitespace-nowrap text-right text-s font-medium">
                                                            <a href="{{ route('clases.tareas.show', [$lesson, $homework]) }}"
                                                                class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                                        </td>
                                                        </tr>
                                                        <script
                                                            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"
                                                            defer></script>
                                                    </div>

                                    </div>
                                    @endforeach

                                    </tbody>
                                @else
                                    <h1>No hay tareas registradas :(</h1>
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
    <script>
        const modal_overlay = document.querySelector('#modal_overlay');

        function openModal(value) {
            const overlayCl = modal_overlay

            if (value) {
                overlayCl.classList.remove('hidden')
                setTimeout(() => {
                }, 100);
            } else {
                modalCl.add('-translate-y-full')
                setTimeout(() => {
                }, 100);
                setTimeout(() => overlayCl.classList.add('hidden'), 300);
            }
        }
        openModal(false)

    </script>
    <script>
        function toggle(e) {
            e.toggleAttribute('disabled');
        }

    </script>
@endsection
