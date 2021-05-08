<header class="header-principal-index ">
    <div class="Logo-Online">
        <a href="{{ route('main') }}">
            <img src="{{ Asset('img/Logo.png') }}" class="imagen-logo" />
        </a>
        <label>{{ auth()->user()->roles()->first()->name }}</label>
    </div>

    <div class="tercera-linea">

        <div class="alinear-clases tooltip">
            <a href="{{ route('clases.index') }}">
                <button class="boton-mis-clases">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg></button></a>
            <span class="tooltiptext">Clases</span>
        </div>

        <div class="alinear-tareas tooltip">
            <a href="https://sipla.cuci.udg.mx/sipla2/">
                <button class="boton-mis-clases" href="#">
                    <img src="https://i.anunciosya.com.mx/i-a/PUjG-1.jpeg" width="25" height="25" />
                </button>
            </a>
            <span class="tooltiptext">SIPLA</span>
        </div>

        <div class="alinear-tareas  tooltip">
            <a href="http://siiauescolar.siiau.udg.mx/wus/gupprincipal.inicio">
                <button class="boton-mis-clases" href="#">
                    <img src="http://voca.sems.udg.mx/sites/default/files/styles/banner/public/Banner/siiau_icono.jpg?itok=XTcB5Ci-"
                        width="70" height="70" />
                </button>
            </a>
            <span class="tooltiptext">SIIAU</span>
        </div>

        <div class="alinear-tareas  tooltip">
            <a href="{{ route('help') }}">
                <button class="boton-mis-clases" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="9" />
                        <line x1="12" y1="17" x2="12" y2="17.01" />
                        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                    </svg>
                </button>
            </a>
            <span class="tooltiptext">Ayuda</span>
        </div>

        <ul class="opciones alinear-opciones">
            <li>
                <div class="icono-texto">
                    <img style='border-radius: 80px;' class=PNzAWd width=40 height=40 aria-hidden=true
                        src='{{ Storage::url(auth()->user()->image) }}'>
                    <center>
                        {{ auth()->user()->key }}
                    </center>
                </div>
                <ul>
                    <li><a href="{{ route('perfil') }}">Perfil</a></li>
                    <li>
                        <form action="{{ route('logOut') }}" method="POST">
                            @csrf
                            @method('put')
                            <a href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
