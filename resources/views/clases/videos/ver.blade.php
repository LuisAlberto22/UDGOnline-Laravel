@extends('plantillas.principal')
@section('name', 'UDGOnline-' . $video->slug)
@section('body')
    <div>
        <div style="border-radius: 5px ; background-color: #cfcfcf; padding: 8px" class="heading text-center font-bold text-2xl m-5 text-black-100">
			{{$video->name}}
        </div>
        <div style="display: flex;justify-content: center; align-items: center">
            <video width="70%" height="70%" controls>
				<source src="{{Storage::url($video->link) }}">
				</video>
			</div>
			<div style="border-radius: 5px ; background-color: #cfcfcf57; padding: 8px" class="heading text-center font-bold text-2xl m-5 text-black-100">
				{{$video->description}}
			</div>
    </div>
@endsection
