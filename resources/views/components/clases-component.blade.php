
    <div>
        <a href="{{ route('clases.show', $nrc) }}">
            <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs  componente-clase float-left ">
                <img src="https://i.imgur.com/dYcYQ7E.png"  class="w-full" />
                <div class="flex justify-center -mt-8">
                    <img src="{{Storage::url($image)}}"
                    class="rounded-full border-solid border-white border-2 -mt-3">
                </div>
                <div class="text-center px-3 pb-6 pt-2 h-52">
                    <h2 class="text-black  bold font-sans">{{ $name }}</h2>
                    <p class="mt-2 font-sans  text-grey-dark">{{ $nrc  }}</p>
                    @isset($teacher)      
                        <p class="mt-2 font-sans  text-grey-dark">{{ $teacher }}</p>
                    @endisset
                    </div>
                    <div class="flex justify-center pb-3 text-grey-dark">
                    <div class="text-center mr-3 border-r pr-3">
                    </div>
                </div>
            </a>
    </div>
