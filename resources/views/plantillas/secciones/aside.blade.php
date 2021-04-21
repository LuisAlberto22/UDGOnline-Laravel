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