{{-- @extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Página no encontrada'))

@section('image')
<div style="background-image: url('/svg/404.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    <header class="header-principal"></header>
    <div class="header-principal">
        <div class="Logo-Online">
            <img src="{{Asset('img/logo.png')}}" height="90pt" />
        </div>
    </div>
    </header>
        <div style="padding-top: 20%;">
                <img src="https://somosfirstflag.com/wp-content/uploads/2020/03/monotrabajando.gif">
        </div>
</div>

@endsection

@section('message', __('Lo siento, la página solicitada no fue encontrada ')) --}}
@extends('errors.errors')
@section('title','Página no encontrada')
@section('image',Asset('img/cucienega.jpg'))
@section('gif','https://somosfirstflag.com/wp-content/uploads/2020/03/monotrabajando.gif')
@section('code','404')
@section('message')
   Página no encontrada
@endsection