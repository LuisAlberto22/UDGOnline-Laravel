@extends('plantillas.principal')

@section('name','UDGOnline')

@section('body')

<div class="claseiniciada-grid">
	
</div>
<h1 class="text-50xl text-center">Tareas Recientes</h1>
@foreach ($posts as $post)
	{{-- <x-comentario <x-comentario title='{{$post->name}}' description='{{$post->body}}' date="{{$post->created_at}}" user='{{$post->user->name}}' img="{{$post->user->image}}"/> --}}
@endforeach
{{-- {{$posts->link()}} --}}
@endsection
