<style>

    
/*
=====
DEPENDENCES
=====
*/

.r-link{
  display: var(--rLinkDisplay, inline-flex) !important;
}

.r-link[href]{
  text-decoration: var(--rLinkTextDecoration, none) !important;
}

.r-list{
  padding-left: var(--rListPaddingLeft, 0) !important;
  margin-top: var(--rListMarginTop, 0) !important;
  margin-bottom: var(--rListMarginBottom, 0) !important;
  list-style: var(--rListListStyle, none) !important;
}


/*
=====
CORE STYLES
=====
*/

.menu{
  --rLinkColor: var(--menuLinkColor, currentColor);
}

.menu__link{
  display: var(--menuLinkDisplay, block);
}

/* 
focus state 
*/

.menu__link:focus{
  outline: var(--menuLinkOutlineWidth, 2px) solid var(--menuLinkOutlineColor, currentColor);
  outline-offset: var(--menuLinkOutlineOffset);
}

/* 
fading siblings
*/

.menu:hover .menu__link:not(:hover){
  --rLinkColor: var(--menuLinkColorUnactive, rgba(22, 22, 22, .35));
}

/*
=====
PRESENTATION STYLES
=====
*/

.menu{
  background-color: var(--menuBackgroundColor, #f0f0f0);
  box-shadow: var(--menuBoxShadow, 0 1px 3px 0 rgba(0, 0, 0, .12), 0 1px 2px 0 rgba(0, 0, 0, .24));
}

.menu__list{
  display: flex;  
  justify-content: space-around;
}

.menu__link{
  padding: var(--menuLinkPadding, 1.5rem 2.5rem);
  font-weight: 700;
  text-transform: uppercase;
}

/* 
=====
TEXT UNDERLINED
=====
*/

.text-underlined{
  position: relative;
  overflow: hidden;

  will-change: color;
  transition: color .25s ease-out;  
}

.text-underlined::before, 
.text-underlined::after{
  content: "";
  width: 0;
  height: 3px;
  background-color: var(--textUnderlinedLineColor, currentColor);

  will-change: width;
  transition: width .1s ease-out;

  position: absolute;
  bottom: 0;
}

.text-underlined::before{
  left: 50%;
  transform: translateX(-50%); 
}

.text-underlined::after{
  right: 50%;
  transform: translateX(50%); 
}

.text-underlined:hover::before, 
.text-underlined:hover::after{
  width: 100%;
  transition-duration: .2s;
}

/*
=====
SETTINGS
=====
*/

.page__custom-settings{
  --menuBackgroundColor: #6c5ce7;
  --menuLinkColor: #fff;
  --menuLinkColorUnactive: #241c69;
  --menuLinkOutlineOffset: -.5rem; 
}

/*
=====
DEMO
=====
*/

.selected{
  color: red
}

.page{
  box-sizing: border-box; 
}

.page__menu:nth-child(n+2){
  margin-top: 3rem;
}
</style>

<div class="page">
    <nav class="page__menu menu">
      <ul class="menu__list r-list">
        <li class="menu__group"><a href="{{route('clases.show',$lesson)}}" class="menu__link r-link text-underlined {{request()->routeIs('clases.show',$lesson)? "selected": ""}}">Inicio</a></li>
        <li class="menu__group"><a href="{{route('clases.tareas.index',$lesson)}}" class="menu__link r-link text-underlined {{request()->routeIs('clases.tareas.*',$lesson)? "selected": ""}}">Tareas</a></li>
        @can('clases.students.show')
        <li class="menu__group"><a href="{{route('clases.students.show',$lesson)}}" class="menu__link r-link text-underlined {{request()->routeIs('clases.students.show',$lesson)? "selected": ""}}">Alumnos</a></li>
        @endcan
        <li class="menu__group"><a href="{{route('clases.stream',$lesson)}}" class="menu__link r-link text-underlined {{request()->routeIs('clases.stream',$lesson)? "selected": ""}}">Streaming</a></li>
        <li class="menu__group"><a href="{{route('clases.videos',$lesson)}}" class="menu__link r-link text-underlined {{request()->routeIs('clases.videos',$lesson)? "selected": ""}}">Videos</a></li>
      </ul>
    </nav>
  </div>
