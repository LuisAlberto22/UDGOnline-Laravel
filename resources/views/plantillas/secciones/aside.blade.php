<link rel="stylesheet" href="{{asset('css/sidemenu.css')}}">

<div id="sidemenu" class="menu-collapsed scroll-aside">
    <!--Header-->
    <div id="header">
        <div id="title">
            <span>Clases</span>
        </div>
        <div id="menu-btn">
            <div class="btn-hamburguer"></div>
            <div class="btn-hamburguer"></div>
            <div class="btn-hamburguer"></div>
        </div>
    </div>
    <!--Profile-->
    <div id="profile">
        @foreach (auth()->user()->lessons as $lesson)
            
        <div style="text-align: center; border-bottom: 1px solid #686765; border-top: 1px solid #686765;">
            <a href="{{route('clase.index',$lesson)}}">
                    <div id='photo'>
                        <img class=PNzAWd width=40 height=40 style='border-radius: 80px;' aria-hidden=true src='' >
                    </div>
                    <div id='name'>
                        <span>
                            {{$lesson->name}}
                        </span>
                    </div>
                    <small id='name'>
                        {{$lesson->nrc}}
                    </small>
                </a>
                
        </div>
            @endforeach
    </div>

</div>
<script>
    const btn = document.querySelector('#menu-btn');
    const menu = document.querySelector('#sidemenu');
    btn.addEventListener('click', e => {
        menu.classList.toggle("menu-expanded");
        menu.classList.toggle("menu-collapsed");
        document.querySelector('.contenedor-index').classList.toggle('body-expanded');
    });
</script>