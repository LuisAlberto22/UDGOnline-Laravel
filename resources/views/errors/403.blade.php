{{-- @extends('errors::illustrated-layout')

@section('code', '403')
@section('title', __('Usuario no autorizado'))

@section('image')
<div style="background-image: url('/svg/403.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    <header class="header-principal">
    <div class="header-principal">
        <div class="Logo-Online">
                <img src="{{Asset('img/logo.png')}}" height="90pt" />
        </div>
    </div>
    </header>
        <div style="padding-top: 20%;">
                <img src="https://www.grupodabia.com/post/2020-05-11-charla-big-data/mono_frustrado.gif">
        </div>
</div>

@endsection

@section('message', __('Usuario no autorizado')) --}}
@extends('errors.errors')
@section('title','Usuario no autorizado')
@section('image',Asset('img/cu-tonala.jpg'))
@section('gif','https://www.grupodabia.com/post/2020-05-11-charla-big-data/mono_frustrado.gif')
@section('code','403')
@section('message')
   Usuario no autorizado
@endsection