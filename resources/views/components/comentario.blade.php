<!-- component -->
<div>
    <div class="sombra2" style="border-radius: 5px;  margin: 2rem; padding: .5rem;">
        <div style="margin-left: 10px; ">
            <H3>Titulo: {{ $post->name}}</H3>
        </div>
        <div style="margin-left: 10px; ">
            <h4>Descripcion: {{ $post->description }}</h4>
        </div>
        <div style="margin-left: 10px; ">
            <h4>Fecha: {{ $post->updated_at }}</h4>
        </div>
        <div class="sombra1" style="border-radius: 5px; margin: 10px">
            {!! $post->content !!}
        </div>
        <div class="sombra1" style="border-radius: 5px; margin: 10px">
            @foreach ($post->files as $file)
                 <x-file-component id="{{$file->id}}" model="App\Models\file"/>
            @endforeach
        </div>
        @if (auth()->user()->id == $post->user_id)
        <div style="display: flex; justify-content: flex-end; margin-bottom: 5px; margin-right: 10px;">
            <form action="{{ route('clases.post.destroy', $post) }}" method="POST">
                @method('delete')
                @csrf
                <button style="border-radius: 5px; padding: 7px; background-color: blue; color: white;">Eliminar
                    Post</button>
                </form>
        </div>
            @endif
    </div>
</div>
