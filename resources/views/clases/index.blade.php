@extends('plantillas.principal')
@section('name', 'UDGOnline-' . $lesson->name)
@section('body')

    @include('plantillas.secciones.nav')
    <x-lesson-banner-component name='{{ $lesson->name }}' nrc='{{ $lesson->nrc }}' image='{{ $lesson->image }}'
        id="{{ $lesson->id }}" />

    <div>
        <!-- component -->
        <div class="p-3 mx-6">
            <button onclick="openModal(true)"
                class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-white focus:outline-none">
                Crear Post
            </button>
        </div>

        <!-- overlay -->
        <div id="modal_overlay"
            class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">

            <!-- modal -->
            <div id="modal"
                class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2  bg-white rounded shadow-lg transition-opacity transition-transform duration-300 tamaño-modal">

                <!-- button close -->
                <button onclick="openModal(false)"
                    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                    &cross;
                </button>
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
                <div class="py-12 bg-gray-100">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-gray-50 border-gray-200">
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('clases.post.store', $lesson) }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="text-xl text-gray-600">Title <span
                                                class="text-red-500">*</span></label></br>
                                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name"
                                            id="title" value="" required></input>
                                    </div>
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                    <div class="mb-4">
                                        <label class="text-xl text-gray-600">Description</label></br>
                                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="description"
                                            id="description" placeholder="(Optional)"></input>
                                    </div>
                                    @error('description')
                                        {{ $message }}
                                    @enderror

                                    <div class="mb-8">
                                        <label class="text-xl text-gray-600">Content <span
                                                class="text-red-500">*</span></label></br>
                                        <textarea name="content" class="border-2 border-gray-500"></textarea>
                                    </div>
                                    @error('content')
                                        {{ $message }}
                                    @enderror
                                    <div style="display: flex; align-items: center;">
                                        <p style=" margin-right: 2rem;">Añadir Archivo</p>
                                        <input type="file" multiple name="files[]">
                                    </div>
                                    @error('files.*')
                                        {{ $message }}
                                    @enderror
                                    <div
                                        class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Postear</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

                <script>
                    CKEDITOR.replace('content');

                </script>

                <!-- header -->

            </div>

        </div>






        
        @foreach ($posts as $post)
                <div>
                    <div class="sombra2" style="border-radius: 5px;  margin: 2rem; padding: .5rem;">
                        <div style="display: flex; margin: .5rem; justify-content: space-between;">
                            <div>
                            <div style="display: flex; align-items: flex-end; margin-left: 10px;margin-bottom: .5rem;">
                            <!--     Aqui van variables de imagen y nombre       -->
                            <img src="{{storage::url($post->user->image)}}"  style="border-radius: 50%;width:60px; height: 60px; margin-right: 10px" alt="">
                            <p style="font-size: small;">{{$post->user->name}}</p>
                            </div>
                                <div style="margin-left: 10px; ">
                                    <H2 style="font-size: large; font-weight: bold;">Titulo: {{ $post->name}}</H3>
                                </div>
                                <div style="margin-left: 10px; ">
                                    <h4>{{ $post->description }}</h4>
                                </div>
                            </div>
                            <div style="margin-left: 10px; ">
                                <h4>Fecha: {{ date('d/m/Y h:i A', strtotime($post->updated_at )) }}</h4>
                            </div>
                        </div>
                        <div class="sombra1" style="border-radius: 5px; margin: 15px">
                            {!! $post->content !!}
                        </div>
                
                        <div style="display: inline-block;">
                            @foreach ($post->files as $file)
                            <div style="float:left; margin-top: 2rem; margin-left: 1rem; margin-bottom: 1rem; " class="download sombra2">
                                <a href="{{route('file.download',$file)}}">
                                    <div style="display: flex; align-items: center; ">
                                        <img style="width: 32px;" src="{{Asset('img/Leon.png')}}">
                                        <div>
                                            <p>Descagar</p>
                                            <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">{{$file->name}}</p>
                                            <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">Extension: {{$file->type}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                
                        @if (auth()->user()->id == $post->user_id)
                        <div style="display: flex; justify-content: flex-end; margin-bottom: 5px; margin-right: 10px;">
                            <form action="{{ route('clases.post.destroy', $post) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button style="border-radius: 5px; padding: 7px; background-color: blue; color: white;">Eliminar
                                    Post</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
        @endforeach

        <script>
            const modal_overlay = document.querySelector('#modal_overlay');
            const modal = document.querySelector('#modal');

            function openModal(value) {
                const modalCl = modal.classList
                const overlayCl = modal_overlay

                if (value) {
                    overlayCl.classList.remove('hidden')
                    setTimeout(() => {
                        modalCl.remove('opacity-0')
                        modalCl.remove('-translate-y-full')
                        modalCl.remove('scale-150')
                    }, 100);
                } else {
                    modalCl.add('-translate-y-full')
                    setTimeout(() => {
                        modalCl.add('opacity-0')
                        modalCl.add('scale-150')
                    }, 100);
                    setTimeout(() => overlayCl.classList.add('hidden'), 300);
                }
            }
            openModal(false)

        </script>
    </div>
    {{ $posts->links() }}

@endsection
