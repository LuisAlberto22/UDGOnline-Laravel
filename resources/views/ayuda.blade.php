@extends('plantillas.principal')

@section('name','UDGOnline-Ayuda')

@section('body')


<div class="container mx-auto px-4 sm:px-8 w-11/12 sombra1" style="padding: 1rem; margin-top: 3rem;">

    <div class="main-title my-8">
        <h1 class="font-bold text-2xl text-center">¿Como podemos ayudarte?</h1>
    </div>

    <div class="main-question mb-8 flex flex-col divide-y text-gray-800 text-base">
        <div class="item px-6 py-6" x-data="{isOpen : false}">
            <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                <h4 style="font-weight: 900;" :class="{'text-blue-600 font-bold' : isOpen == true}">- Conoce tu entorno</h4>
                <svg class="w-5 h-5 text-black-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
            <div style="font-size: small ;" x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-black-600' : isOpen == true}">
                <div style="display: flex; justify-content: center;">
                    <p style="color: rgb(52, 199, 204);">Header</p>
                </div>
                <div style="display: flex; align-items: center; ">
                    <img style="height: 48px; width: 64px;" src="{{asset('img/logo.png')}}" alt="">
                    <p style="margin-left: 2rem;">Icono UDGOnline: Este icono nos servira para redireccionarnos a la pagina principal</p>
                </div>
                <div style="display: flex; align-items: center;  ">
                    <img style="height: 48px;  width: 40px;" src="{{asset('img/clases.jpg')}}" alt="">
                    <p style="margin-left: 4.4rem;">Icono clases: Este icono nos servira para redireccionarnos a nuestras clases</p>
                </div>
                <div style="display: flex; align-items: center; ">
                    <img style="height: 48px;  width: 40px;" src="{{asset('img/sipla.jpg')}}" alt="">
                    <p style="margin-left: 4.4rem;">Icono SIPLA: Este icono nos servira para redireccionarnos a SIPLA</p>
                </div>
                <div style="display: flex; align-items: center; ">
                    <img style="height: 32px;  width: 64px;" src="{{asset('img/siauu.jpg')}}" alt="">
                    <p style="margin-left: 2rem;">Icono SIAUU: Este icono nos servira para redireccionarnos a SIAUU</p>
                </div>
                <div style="display: flex; align-items: center; ">
                    <img style="height: 48px;  width: 40px;" src="{{asset('img/ayuda.jpg')}}" alt="">
                    <p style="margin-left: 4.4rem;">Icono Ayuda: Este icono nos servira para redireccionarnos a esta pagina</p>
                </div>
                <div style="display: flex; align-items: center; ">
                    <img style="height: 48px;  width: 40px;" src="{{asset('img/Leon.png')}}" alt="">
                    <p style="margin-left: 4.4rem;">Icono Usuario: Este icono despliega la opcion de perfil y cerrar sesion</p>
                </div>
                <div style="display: flex; justify-content: center;">
                    <p style="color: rgb(52, 199, 204); margin-top: 1rem;">Aside</p>
                </div>
                <div style="display: flex; margin-top: 2rem; align-items: center; ">
                    <div style="display: flex; align-items: center;">
                        <img style="" src="{{asset('img/aside-colapsado.jpg')}}" alt="">
                        <p style="margin-left: 2rem;">Aside colapsado: Este mostrara la imagen de la clase,
                            puedes dar click en ellas e ir hacia esa clase</p>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <img style="height: 266px;" src="{{asset('img/aside-abierto.jpg')}}" alt="">
                        <p style="margin-left: 2rem;">Aside abierto: Este mostrara la imagen, nombre y nrc de la clase
                            puedes dar click en ellas e ir hacia esa clase</p>
                    </div>
                </div>

            </div>
            <div style="font-size: initial ;" x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-black-600' : isOpen == true}">

            </div>
        </div>

        <div class="item px-6 py-6" x-data="{isOpen : false}">
            <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                <h4 style="font-weight: 900;" :class="{'text-blue-600 font-bold' : isOpen == true}">- Donde puedo entrar a mi clase en vivo</h4>
                <svg class="w-5 h-5 text-black-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
            <div style="font-size: 15px ;" x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-black-600' : isOpen == true}">
                <div style="display: flex; align-items: center;">
                    <img style="height: 266px;" src="{{asset('img/streaming.jpg')}}" alt="">
                    <p style="margin-left: 2rem;">Para ir a una clase en vivo, basta con ir a cualquier clase y presionar streaming
                        en el menu de navegacion, para que una clase inicie el maestro debera introducir las credenciales de host.</p>
                </div>
            </div>
        </div>

        <div class="item px-6 py-6" x-data="{isOpen : false}">
            <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                <h4 style="font-weight: 900;" :class="{'text-blue-600 font-bold' : isOpen == true}">- Como ver Videos de clases grabadas</h4>
                <svg class="w-5 h-5 text-black-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
            <div style="font-size: 15px ;" x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-black-600' : isOpen == true}">
            <div style="display: flex; align-items: center;">
                    <img style="height: 266px;" src="{{asset('img/videos.jpg')}}" alt="">
                    <p style="margin-left: 2rem;">Para ver los videos de clases grabadas, debes entrar a una clase y dar click en 
                la opcion videos que se encuentra en el menu de navegacion, a continuacion da click sobre el video que deseas ver</p>
                </div>
            </div>
        </div>

    </div>


</div>

</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>

@endsection