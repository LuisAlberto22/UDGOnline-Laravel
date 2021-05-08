@extends('plantillas.principal')

@section('name', 'UDGOnline')

@section('body')

    <style>
 @import url(https://fonts.googleapis.com/css?family=Roboto Condensed:300|Oswald);
.wordCarousel {
  font-size: 75px;
  font-weight: 100;
  color: rgb(0, 0, 0);
}
.wordCarousel div {
  overflow: hidden;
  position: relative;
  float: right;
  height: 65px;
  padding-top: 10px;
  margin-top: -10px;
}
.wordCarousel div li {
  font-family: Serif;
  color: rgb(0, 0, 0);
  font-weight: 700;
  padding: 0 10px;
  height: 45px;
  margin-bottom: 45px;
  display: block;
}
.flip2 {
  animation: flip2 6s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}
.flip3 {
  animation: flip3 8s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}
.flip4 {
  animation: flip4 10s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}
@keyframes flip2 {
  0% {
    margin-top: -180px;
  }
  5% {
    margin-top: -90px;
  }
  50% {
    margin-top: -90px;
  }
  55% {
    margin-top: 0px;
  }
  99.99% {
    margin-top: 0px;
  }
  100% {
    margin-top: -270px;
  }
}
@keyframes flip3 {
  0% {
    margin-top: -270px;
  }
  5% {
    margin-top: -180px;
  }
  33% {
    margin-top: -180px;
  }
  38% {
    margin-top: -90px;
  }
  66% {
    margin-top: -90px;
  }
  71% {
    margin-top: 0px;
  }
  99.99% {
    margin-top: 0px;
  }
  100% {
    margin-top: -270px;
  }
}
@keyframes flip4 {
  0% {
    margin-top: -360px;
  }
  5% {
    margin-top: -270px;
  }
  25% {
    margin-top: -270px;
  }
  30% {
    margin-top: -180px;
  }
  50% {
    margin-top: -180px;
  }
  55% {
    margin-top: -90px;
  }
  75% {
    margin-top: -90px;
  }
  80% {
    margin-top: 0px;
  }
  99.99% {
    margin-top: 0px;
  }
  100% {
    margin-top: -270px;
  }
}
.contenedor-index,html {
  width: 100%;
  height: 100vh;
  margin: 0;
  padding: 0;
  overflow: hidden;
}
.contenedor-index {
  font-family: "Roboto Condensed", cursive;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgb(255, 255, 255);
}
.contenedor-index ::after {
  content: "";
  display: block;
  width: 110%;
  height: 125vh;
  background: radial-gradient(#222, #000);
  position: absolute;
  z-index: -1;
  transform: rotate(20deg);
  border-radius: 50%;
}
    </style>

<h4 class="wordCarousel">
    <span>UDGOnline: </span>
    <div>
        <!-- Use classes 2,3, or 4 to match the number of words -->
        <ul class="flip4">
            <li>Democracia</li>
            <li>Desarrollo Sustentable</li>
            <li>Equidad</li>
            <li>Honestidad</li>
            <li>Justicia</li>
            <li>Legalidad</li>
            <li>Solidaridad</li>
        </ul>
    </div>
</h4>

@endsection
