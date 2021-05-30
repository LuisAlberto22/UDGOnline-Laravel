@extends('plantillas.principal')
@section('name', 'UDGOnline-Alumnos')
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
                    <li class="menu__group"><a href="{{ route('clases.tareas.students', [$lesson, $homework]) }}"
                            class="menu__link r-link text-underlined {{ request()->routeIs('clases.tareas.students', [$lesson, $homework]) ? 'selected' : '' }}">Trabajos
                            de los alumnos</a></li>
                @endcan
            </ul>
        </nav>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Alumno
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Codigo
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tarea
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha de entrega:
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha de asignación:
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha de la ultima modificación:
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado:
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
                                    <!--     Oscar trabajando       -->
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
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="item  py-6" x-data="{isOpen : false}">
                                                        <a href="#" class="flex items-center justify-between"
                                                            @click.prevent="isOpen = true">
                                                            <h4 style="font-weight: 900;"
                                                                :class="{'text-blue-600 font-bold' : isOpen == true}">
                                                                {{ $homework->name }}</h4>
                                                            <svg class="w-5 h-5 text-black-500" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </a>
                                                        <div style="font-size: small ;" x-show="isOpen"
                                                            @click.away="isOpen = false" class="mt-3"
                                                            :class="{'text-black-600' : isOpen == true}">
                                                            <div class="text-s text-gray-900">
                                                                {{ $homework->description }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @isset($student->pivot->delivered_date)
                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                    {{date('d/m/Y h:i A', strtotime($student->pivot->delivered_date))  }}
                                                </td>
                                                @else
                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                    Sin fecha
                                                </td>
                                                @endisset
                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                    {{date('d/m/Y h:i A', strtotime($homework->created_at))  }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                    {{date('d/m/Y h:i A', strtotime($homework->updated_at))  }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                    {{ $student->pivot->status }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                                                    {{ $student->pivot->score }}
                                                </td>
                                                @isset($homework)
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-s font-medium">
                                                        <a href="{{ route('clases.tareas.students.review', [$lesson, $homework, $student->key]) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                                    </td>
                                                @endisset
                                            </tr>
                                            <script
                                                src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"
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
    </div>
@endsection
