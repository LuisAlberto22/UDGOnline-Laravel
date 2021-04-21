@extends('plantillas.principal')
@section('body')
<body>
    <div class="contenedor-principal">
        <div class="contenedor-index" style="display: block;">
            @include('plantillas.secciones.nav')
            <div class="hero ">
                <div class="info-hero">
                    <p></p>
                </div>
            </div>

            <form id="post" class="contenedor-publicacion" method="POST" action="../lib/comentarios/loadRespuestas">
                <input type="textarea" name="comentario" class="textarea-publicar" id="" placeholder="Ingrese su Comentario"></textarea>
                <label for="Archivo">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" />
                    </svg>
                </label>
                <input type="file" name="Archivo" id="Archivo" style="display:none">
                <div class="btn-publicar"><input type="submit" value="Publicar"></button></div>
            </form>

            <div id="comentarios" class="contenedor-comentarios  scroll-comentarios">
                <script type="text/javascript">
                    function respuestas(n, id) {
                        $.ajax({
                            url: "../lib/comentarios.php",
                            method: "GET",
                            data: {
                                n: n,
                                id: id,
                                method: "loadRespuestas"
                            },
                        }).done(function(e) {
                            document.getElementById(id).innerHTML = e;
                        })
                    }
                </script> -->
                <script src="script.js"></script>
            </div>
        </div>
</body>
@endsection