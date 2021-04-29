<div>
    <!-- component -->
    <div class="p-3 mx-6">
        <button onclick="openModal(true)" class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-white focus:outline-none">
            Crear Post
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
            <x-postear />
            
            <!-- header -->
            <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Postear</button>
                <button onclick="openModal(false)" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none">Cancelar</button>
            </div>
        </div>

    </div>

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