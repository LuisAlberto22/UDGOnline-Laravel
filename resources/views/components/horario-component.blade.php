
<style>
    .date:after {
        content: "";
        position: absolute;
        border-top: 1px solid #e2e8f0;
        top: 12px;
        width: 250px;
    }

    .date:after {
        margin-left: 15px;
    }

</style>
    <div class=" mb-24 bg-white rounded-lg w-full 3 p-4 shadow">
        <div>
            <div class="flex  border-b mb-4">

                <span class="bg-red-600 h-5 w-5 rounded-full block mt-2"></span>
                <span class="ml-6"> Materia : {{$name}}</span>
                <span class="ml-6"> Dia : {{$day}}</span>
            </div>
            <div class="mb-3 flex border-b border-dashed">
                <!--       Este es el bloque por materia        -->
                <div class="w-1/12">
                    <span class="bg-blue-400 h-5 w-5 rounded-full block mt-2"></span>
                </div>
                <div class="w-2/12">
                    <span class="text-base text-gray-600 block">Hora Iniciar : {{$start}}</span>
                    <span class="text-base text-gray-600 block">Hora que termina : {{$end}}</span>
                </div>
                <div class="w-9/12 ml-6">
                    <span class=" text-2x1 font-semibold block"></span>
                    <span class="text-2x1"></span>
                </div>
            </div>

        </div>
    </div>