@extends('plantillas.principal')
@section('name', 'UDGOnline')
@section('body')

<div style="display: flex; justify-content: center;">
    <form action="{{route('clases.tareas.students.update',[$lesson,$studentHomework,$user->key])}}"
     method="Post" class="sombra1" style="width: 50%; border-radius: 5px; padding: 10px;  margin-top: 3rem;">
        @csrf
        @method('put')
        <div style="display: flex;">
            <p style="font-weight: bold; margin-right: 1rem;">Alumno: </p>
            <p> {{$user->name}}</p>
        </div>
        <div style="display: flex;">
            <p style="font-weight: bold; margin-right: 3rem;">Tarea:</p>
            <p> {{$studentHomework->name}}</p>
        </div>
        <div style="display: flex; align-items: center;">
            <P style="font-weight: bold; margin-right: .5rem;">Calificacion:</P>
            <label style="border-radius: 5px;" for="score"></label>
            <input type="text" name="score">/100
        </div>
        <div style="display: flex; align-items: center ;">
            <div>
                <p style="font-weight: bold; margin-right: 2rem;">Añadir un comentario: </p>
            </div>
            <div>
                <textarea class="sombra1" placeholder="Añadir comentario (opcional)" style="height: 5rem; width: 30rem; border-radius: 5px;" name="note" id=""></textarea>
            </div>
        </div>
        <div>
            <p style="font-weight: bold; margin-right: 2rem; ">Archivos del alumno:</p>
            @foreach ($studentHomework->pivot->files_user as $file)
            <div style="float:left; margin-top: 2rem; margin-left: 1rem; margin-bottom: 1rem; " class="download sombra2">
                <a href="{{route('file.download',$file)}}">
                    <div style="display: flex; align-items: center; ">
                        <img style="width: 32px;" src="{{Asset('img/Leon.png')}}">
                        <div>
                            <p>Descagar</p>
                            <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">{{$file->name}}</p>
                            <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">Extension: {{$file->type}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div style="display: flex; justify-content: flex-end;">
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-white focus:outline-none">Calificar</button>
        </div>
    </form>
</div>
@endsection