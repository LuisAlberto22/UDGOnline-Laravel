@extends('plantillas.principal')
@section('name','UDGOnline-')
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
</body>
@endsection