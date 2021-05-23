<div class="componente-clase float-left w-80 h-80">
    <!-- component -->
    <style>
        body {
            background: white !important;
        }

    </style>

    <div class="holder  ">
        <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative w-80 ">
            <img class="w-full" src="{{Storage::url($video->image)}}" alt="" />
            <div
                class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">
                {{$video->duration}}</div>
            <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
           
            </div>
            <div class="desc p-4 text-gray-800">
                <a href="{{route('clases.videos.ver',$video)}}" target="_new"
                    class="title font-bold block cursor-pointer hover:underline">{{$video->name}}</a>
                <span class="description text-sm block py-2 border-gray-400 mb-2">{{$video->description}}</span>
                <a href="{{route('video.download',$video)}}"><span class="description text-sm block py-2 border-gray-400 mb-2">Descargar</span></a>
            </div>
        </div>
    </div>
</div>
