@extends('plantillas.principal')
@section('name','videos')
@section('body')
<body>

	<main>
        @include('plantillas.secciones.nav')
		<div class="contenedor-sections">
			<div class="video">

				<video width="100%" height="90%" controls>
					<source src="">
				</video>

				<div>
					<button>
						Agregar Nota
					</button>
					<button>
					</button>
				</div>
			</div>
			<div class="comentarios">
				<legend> comentarios </legend>
			</div>
			<div class="lista">
			</div>
		</div>
	</main>




	<footer class="Footer-principal-index">
		<div class="pie-de-pagina">
			<div class="Derechos">
				<a href="#">
					<p>Derechos Reservados</p>
				</a>
			</div>
			<div class="Contacto">
				<a href="#">
					<p>Contactanos</p>
				</a>
			</div>
		</div>
	</footer>
</body>
@endsection