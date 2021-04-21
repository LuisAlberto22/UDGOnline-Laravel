@extends('plantillas.principal')
@section('name','videos')
@section('body')
<body>
  
   <div class="contenedor-principal">
    <div class="contenedor-index" style="display: block;">
        <!-------------------------------------------->
        @include('plantillas.secciones.nav')
        <!-------------------------------------------->
        <div style="display: flex; justify-content: center; margin-top: 1rem;">
            <legend></legend>
        </div>
        <div class="contenedor-videos">
        
        </div>
    </div>
</div>
</body>
@endsection