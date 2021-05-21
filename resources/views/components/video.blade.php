<div>
    <!-- component -->
    <style>
        body {
            background: white !important;
        }

    </style>

    <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
        <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
            <img class="w-full" src="{{Storage::url($image)}}" alt="" />
            <div
                class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">
                10:53</div>
            <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
           
            </div>
            <div class="desc p-4 text-gray-800">
                <a href="{{route('clases.videos.ver',[$lesson,$link])}}" target="_new"
                    class="title font-bold block cursor-pointer hover:underline">{{$name}}</a>
                <a href="https://www.youtube.com/user/sam14319" target="_new"
                    class="badge bg-indigo-500 text-blue-100 rounded px-1 text-xs font-bold cursor-pointer">{{$lesson}}</a>
                <span class="description text-sm block py-2 border-gray-400 mb-2">{{$description}}</span>
            </div>
        </div>
    </div>
</div>
