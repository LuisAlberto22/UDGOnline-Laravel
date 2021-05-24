<!-- component -->
<div>
    <div class="sombra2" style="border-radius: 5px;  margin: 2rem; padding: .5rem;">
        <div style="display: flex; margin: .5rem; justify-content: space-between;">
            <div>
            <div style="display: flex; align-items: flex-end; margin-left: 10px;margin-bottom: .5rem;">
            <!--     Aqui van variables de imagen y nombre       -->
            <img src="{{storage::url($post->user->image)}}"  style="border-radius: 50%;width:60px; height: 60px; margin-right: 10px" alt="">
            <p style="font-size: small;">{{$post->user->name}}</p>
            </div>
                <div style="margin-left: 10px; ">
                    <H2 style="font-size: large; font-weight: bold;">Titulo: {{ $post->name}}</H3>
                </div>
                <div style="margin-left: 10px; ">
                    <h4>{{ $post->description }}</h4>
                </div>
            </div>
            <div style="margin-left: 10px; ">
                <h4>Fecha: {{ date('d/m/Y h:i A', strtotime($post->updated_at )) }}</h4>
            </div>
        </div>
        <div class="sombra1" style="border-radius: 5px; margin: 15px">
            {!! $post->content !!}
        </div>

        <div style="display: inline-block;">
            @foreach ($post->files as $file)
            <x-file-component id="{{$file->id}}" model="App\Models\file" />
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