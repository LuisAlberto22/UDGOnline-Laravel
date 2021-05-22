@extends('plantillas.principal')

@section('name', 'UDGOnline')

@section('body')

<style>
  .texto-main {
    margin-top: 15%;

  }

  .tooltip:hover .tooltiptext {
    visibility: hidden;
  }

  .boton-mis-clases:hover {
    background-color: white;
    cursor: pointer;
  }

  .background-main {
    width: 100%;
    height: calc(100vh - 72px);
    position: relative;
    display: inline-block;
    text-align: center;
    transition: all 1.s ease-in-out;
    animation: imagenes 70s infinite linear;
    
  }

  @keyframes imagenes {
    0% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucienega.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucienega.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    9% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucienega.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucienega.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }

    10% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cuaad.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cuaad.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    19% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cuaad.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cuaad.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    20% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucba.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucba.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    29% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucba.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucba.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    30% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cuvalles.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cuvalles.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    39% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cuvalles.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cuvalles.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    40% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucosta.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucosta.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    49% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucosta.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucosta.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    50% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucs.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucs.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    59% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucs.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucs.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    60% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucsh.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucsh.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    69% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cucsh.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cucsh.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    70% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cusur.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cusur.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    79% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cusur.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cusur.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    80% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cutonala.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cutonala.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    89% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/cutonala.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/cutonala.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    90% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/rectoriaudg.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/rectoriaudg.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
    100% {
      background: #b92b27;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, rgba(21, 101, 192, 0.618), rgba(185, 44, 39, 0.597)),
        url("{{asset('img/rectoriaudg.jpg')}}");
      ;
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, rgba(21, 101, 192, 0.597), rgba(185, 44, 39, 0.583)),
        url("{{asset('img/rectoriaudg.jpg')}}");
      ;
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
  
   

   
  }

  .wave {
    width: 100%;
    position: absolute;
    bottom: 0;
  }
</style>


<div class="background-main">
  <div class="texto-main">
    <H1 style="font-size: 6rem; color: white;">Bienvenido a UDGOnline</H1>
    <p style="color: whitesmoke;">Esta es una plataforma educativa pensada y creada con el fin asegurar el aprendizaje</p>
  </div>
  <div style="margin-top: 1rem;">
    <a style="color:  rgb(111, 248, 248); margin-top: 1rem;" href="{{route('help')}}">Como empezar</a>
  </div>
  <div class="wave" style="height: 100px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
      <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(52,52,52, 0.8);">
      </path>
    </svg></div>
</div>

@endsection
