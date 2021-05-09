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
     @if ($homework
            ->files
            ->count() > 0)
         HOLA
     @endif


@endsection