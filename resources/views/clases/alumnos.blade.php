@extends('plantillas.principal')

@section('name', 'UDGOnline-' . $lesson->name . '-Students')
@section('body')

    @include('plantillas.secciones.nav')

    <x-lesson-banner-component name='{{ $lesson->name }}' nrc='{{ $lesson->nrc }}' image='{{ $lesson->image }}'
        id="{{ $lesson->id }}" />
        @if (session('info'))
                    <div class="bg-indigo-900 text-center py-4 lg:px-4">
                        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                            role="alert">
                            <span
                                class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Nuevo</span>
                            <span class="font-semibold mr-2 text-left flex-auto">{{ session('info') }}</span>
                            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                            </svg>
                        </div>
                    </div>
                @endif

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre:
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Código:
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Calificación:
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($students as $student)
                                <div>
                                    <div class="sombra1">
                                        <!-- This example requires Tailwind CSS v2.0+ -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="{{ Storage::url($student->image) }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-s font-medium text-gray-900">
                                                            {{ $student->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-s text-gray-900">{{ $student->key }}</div>
                                            </td>
                                            <form action="{{route('clases.students.edit',[$lesson,$student])}}" method="POST">
                                                @csrf
                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                    <input type="text" value="{{ $student->pivot->score }}" name="score">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div style="margin-left: 10px; margin-top: 3rem;">
                                                        <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Modificar calificación</button>
                                                    </div>
                                                </td>
                                            </form>

                                          
                                        </tr>
                                        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"
                                            defer></script>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
