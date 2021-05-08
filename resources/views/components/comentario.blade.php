<!-- component -->
<div>
    <div style="border-radius: 5px;  border: solid 1px gray; margin: 2rem;">
        <div style="margin-left: 10px; ">
            <H3>Titulo: {{ $title }}</H3>
        </div>
        <div style="margin-left: 10px; ">
            <h4>Descripcion: {{ $description }}</h4>
        </div>
        <div style="margin-left: 10px; ">
            <h4>Fecha: {{ $date }}</h4>
        </div>
        <div style="border: solid .2px gray; border-radius: 5px; margin: 10px">
            {!! $content !!}
        </div>
        <div style="display: flex; justify-content: flex-end; margin-bottom: 5px; margin-right: 10px;">
            <a href="{{ route('clases.post.destroy', $id) }}">
                <button style="border-radius: 5px; padding: 7px; background-color: blue; color: white;">Eliminar
                    Post</button>
            </a>
        </div>
    </div>
</div>
