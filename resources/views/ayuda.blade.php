@extends('plantillas.principal')

@section('name','UDGOnline-Ayuda')

@section('body')
<!-- component -->


<div class="container mx-auto px-4 sm:px-8 w-11/12">

    <div class="main-title my-8">
        <h1 class="font-bold text-2xl text-center">¿Como podemos ayudarte?</h1>
    </div>

    <div class="main-question mb-8 flex flex-col divide-y text-gray-800 text-base">
        <div class="item px-6 py-6" x-data="{isOpen : false}">
            <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                <h4 style="font-weight: 900;" :class="{'text-blue-600 font-bold' : isOpen == true}">- Como crear una clase</h4>
                <svg class="w-5 h-5 text-black-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
            <div style="font-size: initial ;" x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-black-600' : isOpen == true}">
                Los usuario tipo maestro podran acceder a esta opcion en ""
            </div>
        </div>

        <div class="item px-6 py-6" x-data="{isOpen : false}">
            <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                <h4 style="font-weight: 900;" :class="{'text-blue-600 font-bold' : isOpen == true}">- Ver Videos de clases Pasadas</h4>
                <svg class="w-5 h-5 text-black-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
            <div style="font-size: initial ;" x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-black-600' : isOpen == true}">
                Los videos estaran disponibles en la seccion "videos" del menu de navegacion al entrar en una clase
            </div>
        </div>

        <div class="item px-6 py-6" x-data="{isOpen : false}">
            <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                <h4 style="font-weight: 900;" :class="{'text-blue-600 font-bold' : isOpen == true}">- Como iniciar una transmision</h4>
                <svg class="w-5 h-5 text-black-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
            <div style="font-size: initial ;" x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-black-600' : isOpen == true}">
                Las transmiciones se inician en ""
            </div>
        </div>

    </div>

    <div class="main-images mb-8 " style="max-width: 256px;">
        <div class="image bg-white rounded-lg shadow-lg overflow-hidden">
            <button onclick="openModal(true)">
                <img style="width: 256px;" src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a" alt="Send massage to support disk" title="Send massage to support disk">
                <span style="font-size: medium;" class="text-center p-2 text-black-700 text-sm inline-block w-full">Soporte tecnico</span>
            </button>
        </div>
        <!-- overlay -->
        <div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
            <!-- modal -->
            <div id="modal" class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2  bg-white rounded shadow-lg transition-opacity transition-transform duration-300 tamaño-modal">
                <!-- button close -->
                <button onclick="openModal(false)" class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                    &cross;
                </button>
                <div style="max-height: 50rem;">
                    <div>
                       
                    </div>
                </div>
                <!-- header -->
                <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                    <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Enviar</button>
                    <button onclick="openModal(false)" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none">Cancelar</button>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
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
@endsection