<!-- component -->

    <div class="sombra2" style="border-radius: 5px;  margin: 2rem; padding: .5rem;">
        <div style="margin-left: 10px; ">
            <H3>Titulo: {{ $title }}</H3>
        </div>
        <div style="margin-left: 10px; ">
            <h4>Descripcion: {{ $description }}</h4>
        </div>
        <div style="margin-left: 10px; ">
            <h4>Fecha: {{ $date }}</h4>
        </div>
        <div class="sombra1" style="border-radius: 5px; margin: 10px">
            {!! $content !!}
        </div>
        @if (auth()->user()->id == $userId)
        <div style="display: flex; justify-content: flex-end; margin-bottom: 5px; margin-right: 10px;">
            <form action="{{ route('clases.post.destroy', $id) }}" method="POST">
                @method('delete')
                @csrf
                <button style="border-radius: 5px; padding: 7px; background-color: blue; color: white;">Eliminar
                    Post</button>
                </form>
            </div>
            @endif

