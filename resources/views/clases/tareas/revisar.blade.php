@extends('plantillas.principal')
@section('name', 'UDGOnline')
@section('body')



<form action="{{route('clases.tareas.students.update',[$lesson,$studentHomework,$user->key])}}" method="Post" style="border: solid 1px black; width: 50%; border-radius: 5px; padding: 10px; margin: 5px;">
    @csrf
    @method('put')
        <div>
            <p>Alumno: {{$user->name}}</p>
        </div>
        <div>
            <p>Tarea: {{$studentHomework->name}}</p>
        </div>
        <div style="display: flex; align-items: center;">
            <P style="margin-right: 1rem;">Calificacion:</P>
            <label style="border-radius: 5px;" for="score"></label>
            <select name="score" id="">
                 @foreach (range(1, 100) as $num) 
                    <option value="{{$num}}"> {{$num}} </option>
                @endforeach
            </select>
        </div>
        <div style="display: flex; align-items: center ;">
            <div>
                <p style="margin: 1px;">Añadir un comentario: </p>

            </div>
            <textarea placeholder="Añadir comentario (opcional)" style="height: 2rem; border-radius: 5px;" name="note" id=""></textarea>
        </div>
        <div>
            <p>Archivos del alumno:</p>
            @foreach ($studentHomework->pivot->files_user as $file)
                <x-file-component id="{{$file->id}}"model="App\Models\file"/>
            @endforeach
        </div>
        <div style="display: flex; justify-content: flex-end;">
            <button type="submit" style="height: 1.5rem; position: z; border-radius: 5px;">Calificar</button>
        </div>
    </form>
    @endsection