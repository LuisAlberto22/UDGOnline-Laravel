@extends('plantillas.principal')
@section('name', 'UDGOnline')
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
                <li class="menu__group"><a href="{{ route('clases.tareas.show', [$lesson, $homework]) }}"
                        class="menu__link r-link text-underlined {{ request()->routeIs('clases.tareas.show', [$lesson, $homework]) ? 'selected' : '' }}">Detalles</a>
                </li>
                @can('clases.tareas.students')
                <li class="menu__group"><a href="{{route('clases.tareas.students',[$lesson, $homework])}}"
                    class="menu__link r-link text-underlined {{ request()->routeIs('cclases.tareas.students',[$lesson, $homework]) ? 'selected' : '' }}">Trabajos
                    de los Alumnos</a></li>
                @endcan
            </ul>
        </nav>
    </div>
    <div style="display: flex; margin: 2rem; justify-content: space-around;">
        <div style="border-radius: 5px;  border: solid 1px gray;  width: 73%;">
            <div style="margin-left: 10px; margin-right: 10px; display: flex; justify-content: space-between;">
                <H3>{{$homework->name}}</H3>
                <div>
                    <h6 style="margin: 10px;">Calificacion maxima: {{$homework->max_calification}}</h6>
                    <h6 style="margin: 10px;">Fecha de entrega: {!!date('d/m/Y h:i A',strtotime($homework->delivery_date))!!}</h6>
                </div>
            </div>

            <div style="margin-left: 10px; ">
                <h4 style="margin-top: 10px; margin-bottom: 10px;">{{$homework->description}}</h4>
            </div>
            <div style="margin: 10px">
                @foreach ($homework->files as $file)
                <p></p>
                @endforeach
            </div>
        </div>
        @can('clases.tareas.upload')
        <div style="border-radius: 5px;  border: solid 1px gray; width: 25%; height: 15%;">
            <div style="display: flex; align-items: center; margin-left: 10px   ;">
                <h3>Subir archivo</h3>
                <input style="padding: 4px; color: white; border-radius: 5px;" id="files" type="file" multiple name="file">
            </div>
            <div style="margin-right: 10px; direction: rtl;">
                <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Entregar tarea</button>
            </div>
        </div>
        @endcan
    </div>


@endsection
