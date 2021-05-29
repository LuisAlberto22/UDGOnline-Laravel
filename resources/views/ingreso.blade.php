<!DOCTYPE html>
<html lang="es">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="description" content="Pagina de educacion en linea de la UDG">
	<meta name="keywords" content="UDG,udg,stream,clases online,streaming">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UDG Online-LogIn</title>
	<link rel="icon" href="{{asset('img/Leon.png')}}" type="image/x-icon" />
	<link rel="preload" href="{{asset('css/normalize.css')}}" as="style">
	<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
	<link rel="preload" href="{{ URL::asset('css/styles.css') }}" as="style">
	<link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
	<header class="header-principal"></header>
	<div class="header-principal">
		<div class="Logo-Online">
			<img src="{{asset('img/Logo.png')}}" height="90pt" />
		</div>
	</div>
	</header>
	<main>
		<div  class="Form-Ingreso">
			<form action="{{route('authenticate')}}" method="POST"  id="Form" class="Form-Inicio">
				@csrf
				<div class="contenedor sombra">
					<fieldset>
						<header class="header-fieldset">
							<div>
								<img src="{{asset('img/Logo.png')}}" height="60pt" />
								<legend class="Legend-Form">Ingresar</legend>
								<img id= "Carga" style="display: none;"  src = 'https://i.kinja-img.com/gawker-media/image/upload/s--LytxZcab--/c_fit,fl_progressive,q_80,w_636/1481054780733836946.gif' width = '100px'>
							</div>
						</header>
						<div>
							 @if ($errors->any())
							<div id="Error-Usuario-ContraseÃ±a" class="Mensaje-Usuario-ContraseÃ±a">
								<div style="color: rgb(94, 21, 21); " class="Mensaje-Usuario-ContraseÃ±a">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="red">
										<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
									</svg>
									{{$errors->first()}}
								</div>
							@endif 
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.3" stroke="black" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<circle cx="12" cy="7" r="4" />
								<path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
							</svg>
							<label class="Txt-Label">Código:</label>
							<input name="Codigo" id="Codigo" autocomplete="on" class="input-text border-radius" placeholder="Codigo" required type="text" >
							@error('Codigo')
								{{$message}}
							@enderror
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" class="icon-key icon-tabler icon-tabler-key" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.3" stroke="Black" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none" />
							<circle cx="8" cy="15" r="4" />
							<line x1="10.85" y1="12.15" x2="19" y2="4" />
							<line x1="18" y1="5" x2="20" y2="7" />
							<line x1="15" y1="8" x2="17" y2="10" />
						</svg>
						<label class="Txt-Label-Nip">NIP: </label>
						<input name="NIP" id="NIP-Input" class="input-text-Nip border-radius" type="password" required placeholder="NIP">
						@error('NIP')
							{{$message}}
						@enderror
						<a class="boton">
							<svg onclick="encriptarDesencriptar(this)" id="eye" xmlns="http://www.w3.org/2000/svg" class=" icon-tabler icon-tabler-eye" width="24" height="16" viewBox="0 0 24 24" stroke-width="3" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path style="padding-top: 5px;" stroke="none" d="M0 0h24v24H0z" fill="none" />
								<circle cx="12" cy="12" r="2" />
								<path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
							</svg>
						</a>
						<div class="contenedor-boton">
							<div class="recordar">
								<label>Recordar Cuenta</label>
								<input type="checkbox" name="recordar">
							</div>
							<input class="boton" type="submit" value="Iniciar">
						</div>
					</fieldset>
				</div>
			</form>
		</div>
	</main>
	
</body>
<!--<script type="text/javascript">
	$("document").ready(function() {$("Form").submit(function(e) {e.preventDefault();let d = new FormData(document.getElementById("Form"));if (d.get("Codigo") == "Ricardo" && d.get("NIP") == "Milos") {document.body.style.backgroundImage = "url(https://en.everybodywiki.com/images/e/ed/Ricardo_Milos.gif)";}else{$("#Carga").fadeIn();$.ajax({
	url: "{{route('login')}}",method: "POST",data: {Codigo: d.get("Codigo"),NIP: d.get("NIP"),recordar: d.get("recordar"),src: d.get("src"),_token:'{{csrf_token()}}'},processData: true,}).done(function(response) {alert(response);document.getElementById("Carga").hidden = true;if (response != false) {location.href = "{{route('main')}}";}else{$("#Error-Usuario-Contraseña").fadeIn();}});
	}});});function encriptarDesencriptar(e) {var NIP = document.getElementById("NIP-Input");if (NIP.getAttribute("type") == "password") {NIP.setAttribute("type", "text");e.innerHTML = "<path stroke=none d='M0 0h24v24H0z' fill='none'/><line x1=3 y1=3 x2=21 y2=21 />" +"<path d='M10.584 10.587a2 2 0 0 0 2.828 2.83 '/>" +"<path d='M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341 '/>";
	} else {NIP.setAttribute("type", "password");e.innerHTML = "<path style=padding-top: 5px; stroke=none d='M0 0h24v24H0z' fill=none />" +"<circle cx=12 cy=12 r=2 />" +"<path d='M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7' />"}}
</script>-->
<script>
	function encriptarDesencriptar(e) {var NIP = document.getElementById("NIP-Input");if (NIP.getAttribute("type") == "password") {NIP.setAttribute("type", "text");e.innerHTML = "<path stroke=none d='M0 0h24v24H0z' fill='none'/><line x1=3 y1=3 x2=21 y2=21 />" +"<path d='M10.584 10.587a2 2 0 0 0 2.828 2.83 '/>" +"<path d='M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341 '/>";
	} else {NIP.setAttribute("type", "password");e.innerHTML = "<path style=padding-top: 5px; stroke=none d='M0 0h24v24H0z' fill=none />" +"<circle cx=12 cy=12 r=2 />" +"<path d='M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7' />"}}	
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>