@extends('plantillas.principal')

@section('name', 'UDGOnline-Perfil')

@section('body')
    <div x-data="{photoName: null, photoPreview: null}">
        <div class="w-full relative mt-0 shadow-2xl rounded my-24 overflow-hidden">
            <div class="top h-64 w-full bg-blue-600 overflow-hidden relative">
                <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                    alt="" class="bg w-full h-full object-cover object-center absolute z-0">
                <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
                    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
                    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js">
                    </script>
                    <div class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                        <div class="text-center">

                            <div class="mt-2" x-show="! photoPreview">
                                <img src="{{ Storage::url(auth()->user()->image) }}"
                                    class="w-40 h-40 m-auto rounded-full shadow">
                            </div>
                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block w-40 h-40 rounded-full m-auto shadow"
                                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"
                                    style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                </span>
                            </div>
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3"
                                x-on:click.prevent="$refs.photo.click()">
                                Imagen
                            </button>
                        </div>
                    </div>
                    <h1 class="text-2xl font-semibold">{{ auth()->user()->name }}</h1>
                </div>
            </div>
            <div class="grid grid-cols-12 bg-white ">

                <div
                    class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">

                    <button onclick="informacion()" id="btn_informacion"
                        class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold">Informacion
                        Escolar</button>
                    <button onclick="horario()" id="btn_horario"
                        class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold">Horario</button>

                </div>
                <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
                    <div id="informacion" class="px-4 pt-4">
                        @if (session('success'))
                            <div class="bg-indigo-900 text-center py-4 lg:px-4">
                                <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                                    role="alert">
                                    <span
                                        class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Nuevo</span>
                                    <span class="font-semibold mr-2 text-left flex-auto">{{ session('success') }}</span>
                                    <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <form action="{{ route('perfil.update') }}" enctype="multipart/form-data" method="POST"
                            class="flex flex-col space-y-8">

                            @csrf
                            @method('put')
                            <input type="file" name="file" class="hidden" x-ref="photo" x-on:change="
                                                        photoName = $refs.photo.files[0].name;
                                                            const reader = new FileReader();
                                                            reader.onload = (e) => {
                                                                photoPreview = e.target.result;
                                                            };
                                                            reader.readAsDataURL($refs.photo.files[0]);">

                            @error('file')
                                {{ $message }}
                            @enderror
                            <div>
                                <h3 class="text-2xl font-semibold">Informacion Escolar</h3>

                            </div>

                            <div class="form-item">
                                <label class="text-xl ">Nombre Completo</label>
                                <input type="text" @if (auth()->user()->hasRole('Alumno')) disabled @endif name="name" value="{{ auth()->user()->name }}"
                                    class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200">
                            </div>
                            @error('name')
                                {{ $message }}
                            @enderror

                            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                                <div class="form-item w-full">
                                    <label class="text-xl ">Codigo</label>
                                    <input type="text" name="key" disabled value="{{ auth()->user()->key }}"
                                        class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 ">
                                </div>
                                @error('key')
                                    {{ $message }}
                                @enderror

                                <div class="form-item w-full">
                                    <label class="text-xl ">Carrera</label>
                                    <input type="text" disabled name="Career" value="{{ auth()->user()->career }}"
                                        class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 ">
                                </div>
                                @error('career')
                                    {{ $message }}
                                @enderror
                                <div class="form-item w-full">
                                    <label class="text-xl ">Correo Electronico</label>
                                    <input type="text" name="email" value="{{ auth()->user()->email }}"
                                        class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 ">
                                </div>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <input type="submit" value="Actualizar">
                        </form>
                    </div>


                    <div style="display: none;" id="horario">
                        <div class=" justify-center p-10 bg-gray-100 h-screen scroll-horario">
                            @foreach ($lessons as $lesson)
                                @foreach ($lesson->schedules as $schedule)
                                    <x-horario-component name='{{ $lesson->name }}' day='{{ $schedule->day }}'
                                        start='{{ $schedule->start }}' end='{{ $schedule->end }}' />
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function informacion() {
                    document.getElementById("informacion").style.display = "block";
                    document.getElementById("horario").style.display = "none";
                }

                function horario() {
                    document.getElementById("informacion").style.display = "none";
                    document.getElementById("horario").style.display = "block";
                }

            </script>

        </div>
    </div>
@endsection
