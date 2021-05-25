@extends('plantillas.principal')

@section('name', 'UDGOnline-Clases')
@section('body')

    <center>
        <legend style="padding: .5rem; background-color: #c8c8c8; border-radius: .5rem;"> Mis Clases</legend>
    </center>
    @foreach ($lessons as $lesson)
            <div>
                <a href="{{ route('clases.show', $lesson->nrc) }}">
                    <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs  componente-clase float-left ">
                        <img src="https://i.imgur.com/dYcYQ7E.png" class="w-full" />
                        <div class="flex justify-center -mt-8">
                            <img src="{{Storage::url($lesson ->image)}}" class="rounded-full border-solid border-white border-2 -mt-3">
                        </div>
                        <div class="text-center px-3 pb-6 pt-2 h-52">
                            <h2 class="text-black  bold font-sans">{{ $lesson ->name }}</h2>
                            <p class="mt-2 font-sans  text-grey-dark">{{ $lesson ->nrc  }}</p>
                            <p class="mt-2 font-sans  text-grey-dark">{{ $lesson ->teacher }}</p>
                        </div>
                        <div class="flex justify-center pb-3 text-grey-dark">
                            <div class="text-center mr-3 border-r pr-3">
                            </div>
                        </div>
                    </div>
                </a>
            
            </div>
    @endforeach

@endsection
