@extends('plantillas.principal')

@section('name','UDGOnline-perfil')

@section('body')
<div class="w-full relative mt-0 shadow-2xl rounded my-24 overflow-hidden">
    <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
      <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
      <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
       <x-update-photo-component/>
        <h1 class="text-2xl font-semibold">{{auth()->user()->name}}</h1>
      </div>
    </div>
    <div class="grid grid-cols-12 bg-white ">
  
      <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">
  
        <button  onclick="informacion()" id="btn_informacion" class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold">Informacion Escolar</button>
        <button onclick="horario()" id="btn_horario"class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold">Horario</button>
  
      </div>
  
      <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div id="informacion"    class="px-4 pt-4">
          <form action="#" class="flex flex-col space-y-8">
  
            <div>
              <h3 class="text-2xl font-semibold">Informacion Escolar</h3>
              
            </div>
  
            <div class="form-item">
              <label class="text-xl ">Nombre Completo</label>
              <input type="text" value="{{auth()->user()->name}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
            </div>
  
            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
  
              <div class="form-item w-full">
                <label class="text-xl ">Codigo</label>
                <input type="text" value="{{auth()->user()->key}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
              </div>
  
              <div class="form-item w-full">
                <label class="text-xl ">Carrera</label>
                <input type="text" value="{{auth()->user()->career}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
              </div>
            </div>
  
          </form>
        </div>
  
        <div  style="display: none;" id="horario">
            <div class=" justify-center p-10 bg-gray-100 h-screen scroll-horario">
                @foreach ($lessons as $lesson)
                    @foreach ($lesson->schedules as $schedule)
                         <x-horario-component name='{{$lesson->name}}' day='{{$schedule->day}}' start='{{$schedule->start}}' end='{{$schedule->end}}'/> 
                    @endforeach
                @endforeach
            </div>
        </div>
      </div>
  
      <script>
          function informacion(){
              document.getElementById("informacion").style.display="block";
              document.getElementById("horario").style.display="none";
          }
          function horario(){
              document.getElementById("informacion").style.display="none";
              document.getElementById("horario").style.display="block";
          }
      </script>
  
    </div>
  </div>
@endsection
