@extends('plantillas.principal')
@section('name', 'UDGOnline-' . $homework->name)
@section('body')



<style>
    .r-link {
        display: var(--rLinkDisplay, inline-flex) !important;
    }

    .r-link[href] {
        text-decoration: var(--rLinkTextDecoration, none) !important;
    }

    .r-list {
        padding-left: var(--rListPaddingLeft, 0) !important;
        margin-top: var(--rListMarginTop, 0) !important;
        margin-bottom: var(--rListMarginBottom, 0) !important;
        list-style: var(--rListListStyle, none) !important;
    }

    .menu {
        --rLinkColor: var(--menuLinkColor, currentColor);
    }

    .menu__link {
        display: var(--menuLinkDisplay, block);
    }


    .menu__link:focus {
        outline: var(--menuLinkOutlineWidth, 2px) solid var(--menuLinkOutlineColor, currentColor);
        outline-offset: var(--menuLinkOutlineOffset);
    }

    .menu:hover .menu__link:not(:hover) {
        --rLinkColor: var(--menuLinkColorUnactive, rgba(22, 22, 22, .35));
    }



    .menu {
        background-color: var(--menuBackgroundColor, #f0f0f0);
        box-shadow: var(--menuBoxShadow, 0 1px 3px 0 rgba(0, 0, 0, .12), 0 1px 2px 0 rgba(0, 0, 0, .24));
    }

    .menu__list {
        display: flex;
        justify-content: space-around;
    }

    .menu__link {
        padding: var(--menuLinkPadding, 1.5rem 2.5rem);
        font-weight: 700;
        text-transform: uppercase;
    }

    .text-underlined {
        position: relative;
        overflow: hidden;

        will-change: color;
        transition: color .25s ease-out;
    }

    .text-underlined::before,
    .text-underlined::after {
        content: "";
        width: 0;
        height: 3px;
        background-color: var(--textUnderlinedLineColor, currentColor);

        will-change: width;
        transition: width .1s ease-out;

        position: absolute;
        bottom: 0;
    }

    .text-underlined::before {
        left: 50%;
        transform: translateX(-50%);
    }

    .text-underlined::after {
        right: 50%;
        transform: translateX(50%);
    }

    .text-underlined:hover::before,
    .text-underlined:hover::after {
        width: 100%;
        transition-duration: .2s;
    }

    .page__custom-settings {
        --menuBackgroundColor: #6c5ce7;
        --menuLinkColor: #fff;
        --menuLinkColorUnactive: #241c69;
        --menuLinkOutlineOffset: -.5rem;
    }


    .selected {
        color: red
    }

    .page {
        box-sizing: border-box;
    }

    .page__menu:nth-child(n+2) {
        margin-top: 3rem;
    }
</style>

<div class="page">
    <nav class="page__menu menu">
        <ul class="menu__list r-list">
            <li class="menu__group"><a href="{{ route('clases.tareas.show', [$lesson, $homework]) }}" class="menu__link r-link text-underlined {{ request()->routeIs('clases.tareas.show', [$lesson, $homework]) ? 'selected' : '' }}">Detalles</a>
            </li>
            @can('clases.tareas.students')
            <li class="menu__group"><a href="{{ route('clases.tareas.students', [$lesson, $homework]) }}" class="menu__link r-link text-underlined {{ request()->routeIs('cclases.tareas.students', [$lesson, $homework]) ? 'selected' : '' }}">Trabajos
                    de los alumnos</a></li>
            @endcan
        </ul>
    </nav>
</div>
<div style="display: flex; margin: 2rem; justify-content: space-around;">
    <div class="sombra2" style="border-radius: 5px; padding: 1rem; width: 73%;">
        <div style="margin-left: 10px; margin-right: 10px; margin-top: 5px; display: flex; justify-content: space-between;">
            <div>
                <H3>Título: {{ $homework->name }}</H3>
            </div>
            <div style="font-size: small;">
                <h6 style="margin: 3px;">Calificación maxima: {{ $homework->max_calification }}</h6>
                @if (auth()->user()->hasRole('Alumno') and $homework->pivot->score)
                <h6 style="margin: 3px;">Calificación: {{ $homework->pivot->score }}</h6>
                @endif
                @isset($homework->delivery_date)
                <h6 style="margin: 3px;">Fecha de entrega: {!! date('d/m/Y h:i A', strtotime($homework->delivery_date)) !!}</h6>
                @endisset
                <h6 style="margin: 3px;">Fecha de asignacion: {!! date('d/m/Y h:i A', strtotime($homework->updated_at)) !!}</h6>
            </div>
        </div>

        <div style=" margin: 0 1.5rem; padding: 2px; margin-top: 1rem; border-radius: .5rem;" class="sombra1">
            <h4 style="">Descripción: {{ $homework->description }}</h4>
        </div>
        <div style="margin: 10px">
            @foreach ($homework->files as $file)
            <div style="float:left; margin-top: 2rem; margin-left: 1rem; margin-bottom: 1rem; " class="download sombra2">
                <a href="{{ route('file.download', $file) }}">
                    <div style="display: flex; align-items: center; ">
                        <img style="width: 32px;" src="{{ Asset('img/Leon.png') }}">
                        <div>
                            <p>Descargar</p>
                            <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">
                                {{ $file->name }}
                            </p>
                            <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">
                                Extensión: {{ $file->type }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    @can('clases.tareas.alumno.upload')
    @if ($homework->pivot->status == 'No Entregada')
    <div class="" style="width: 23%;">
        <form action="{{ route('clases.tareas.subir', [$lesson, $homework]) }}" method="POST" enctype="multipart/form-data" class="sombra1" style="border-radius: 5px;  margin-bottom: 1rem; height: 15rem;">
            @csrf
            @method('put')
            <div style="padding: 1rem;">
                <div style=" display: flex; align-items: center; margin-left: 10px; margin-top: 1rem;">
                    <h3 style="margin-right: 10px;">Subir archivos</h3>
                    <input style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;" id="files" type="file" multiple name="files[]">
                    <label for="files" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Seleccionar</label>
                    </input>
                </div>
                <div style="margin-left: 10px; margin-top: 3rem;">
                    <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Entregar
                        tarea</button>
                </div>
            </div>
        </form>
        <div class="sombra1" style="padding: 1rem;">
            <p>Archivos subidos</p>
            <div style="display: inline-block;">
                @foreach ($homework->pivot->files_user as $file)
                <div style=" display: flex;">
                    <form action="{{ route('clases.tareas.archivo.destroy',[$lesson,$homework,$file]) }}" method="POST">
                        @csrf
                        @method('delete')

                        <a href="#" onclick="this.closest('form').submit()" style=" margin-top: 8px; margin-left: -13px; padding: 3px;
                                " class="bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white boton-cerrar">
                            &cross;
                        </a>
                        <div style="float:left; margin-top: 2rem; margin-left: 1rem; margin-bottom: 1rem; " class="download sombra2">

                            <a href="{{ route('file.download', $file) }}">
                                <div style="display: flex; align-items: center; ">
                                    <img style="width: 32px;" src="{{ Asset('img/Leon.png') }}">
                                    <div>
                                        <p>Descargar</p>
                                        <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">
                                            {{ $file->name }}
                                        </p>
                                        <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">
                                            Extensión: {{ $file->type }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
            <br>
            <br>

            <div> @error('files.*')
                <div style="color: red;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <br>
            <div>
                <p>comentarios</p>
                {{ $homework->pivot->note }}
            </div>
        </div>
    </div>

    @else

    <div class="" style="width: 25rem;">
        <form action="{{ route('clases.tareas.cancel', [$lesson, $homework]) }}" method="POST" enctype="multipart/form-data" class="sombra1" style="border-radius: 5px;  margin-bottom: 1rem; height: 15rem;">
            @csrf
            @method('put')
            <div style="padding: 1rem;">
                <div style="margin-left: 10px; margin-top: 3rem;">
                    <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Anular
                        entrega
                    </button>
                </div>
            </div>
        </form>
        <div class="sombra1" style="padding: 1rem;">
            <p>Archivos subidos</p>

            @foreach ($homework->pivot->files_user as $file)
            <div style="float:left; margin-top: 2rem; margin-left: 1rem; margin-bottom: 1rem; " class="download sombra2">
                <a href="{{ route('file.download', $file) }}">
                    <div style="display: flex; align-items: center; ">
                        <img style="width: 32px;" src="{{ Asset('img/Leon.png') }}">
                        <div>
                            <p>Descagar</p>
                            <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">
                                {{ $file->name }}
                            </p>
                            <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">
                                Extensión: {{ $file->type }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <br>
            <br>
            <br>
            <div>
                <p>comentarios:</p>
                {{ $homework->pivot->note }}
            </div>
        </div>
    </div>
    @endif
    @endcan
</div>


@endsection