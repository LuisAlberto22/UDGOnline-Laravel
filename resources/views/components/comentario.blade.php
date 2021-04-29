<!-- component -->
<div>
    <section class="rounded-b-lg  mt-4 ">
        <div id="task-comments" class=" mx-8">
            <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                <div class=" flex flex-row justify-center mr-2">
                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                    <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left "><span class="text-purple-600 font-semibold">@Usuario</span></p>              
                </div>
                <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">Titulo</h3>
                <h2 class="text-purple-600 font-semibold text-lg text-center md:text-left ">Descripccion</h2>
                <img src="" alt="">
                <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left "><span class="text-purple-600 font-semibold"></span> Fecha </p>



                <button onclick="openModalrepli(true)" class="bg-blue-600 hover:bg-blue-500 px-1 py-.5 rounded text-white focus:outline-none">
                    Responder
                </button>
                <div id="modal_overlayrepli" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">

                    <!-- modal -->
                    <div id="modalrepli" class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2  bg-white rounded shadow-lg transition-opacity transition-transform duration-300 tamaño-modal">

                        <!-- button close -->
                        <button onclick="openModalrepli(false)" class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                            &cross;
                        </button>
                        <!-- component -->
                        <!-- comment form -->
                       
                            <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Añadir Comentario</h2>
                                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                                        <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                                    </div>
                                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                            <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                                      
                                    </div>
                            </form>
                        
                    </div>
                    <!-- header -->
                    <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                        <button class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-white focus:outline-none">Responder</button>
                        <button onclick="openModalrepli(false)" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none">Cancelar</button>
                    </div>
                </div>

            </div>

            <script>
                const modal_overlayrepli = document.querySelector('#modal_overlayrepli');
                const modalrepli = document.querySelector('#modalrepli');

                function openModalrepli(value) {
                    const modalClrepli = modalrepli.classList
                    const overlayClrepli = modal_overlayrepli

                    if (value) {
                        overlayClrepli.classList.remove('hidden')
                        setTimeout(() => {
                            modalClrepli.remove('opacity-0')
                            modalClrepli.remove('-translate-y-full')
                            modalClrepli.remove('scale-150')
                        }, 100);
                    } else {
                        modalClrepli.add('-translate-y-full')
                        setTimeout(() => {
                            modalClrepli.add('opacity-0')
                            modalClrepli.add('scale-150')
                        }, 100);
                        setTimeout(() => overlayClrepli.classList.add('hidden'), 300);
                    }
                }
                openModalrepli(false)
            </script>

        </div>
        <!--  comment end-->
</div>
</section>
</div>