@extends('plantillas.principal')

@section('name', 'UDGOnline-' . $lesson->name . '-Students')
@section('body')

    @include('plantillas.secciones.nav')

    <x-lesson-banner-component name='{{ $lesson->name }}' nrc='{{ $lesson->nrc }}' image='{{ $lesson->image }}'
        id="{{ $lesson->id }}" />

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
                                    Codigo:
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Calificacion:
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
                                            <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                {{ $student->pivot->score }}
                                            </td>

                                          
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
