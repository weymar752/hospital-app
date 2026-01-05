<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
(function(){
    // URLs generadas por Blade
    window.themeLight = "{{ asset('css/site.css') }}";
    window.themeDark  = "{{ asset('css/site2.css') }}";
    var theme = localStorage.getItem('theme') || 'light';
    var href = theme === 'dark' ? window.themeDark : window.themeLight;
    document.write('<link id="themeStylesheet" rel="stylesheet" href="'+href+'">');
})();
</script>
<noscript>
    <!-- Fallback cuando JS esté desactivado -->
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</noscript>
</head>
<body>

<!--  ESTA PARTE DEBE COPIARSE EN TODOS LAS PAGINAS -->
<aside class="sidebar" id="sidebar"> 
    <div class="sidebar-header">
        @if(session()->has('usuario'))
            <div class="sidebar-profile">
                <i class="fas fa-user-circle"></i>
                <!-- Para Personal Médico -->
                @if(session('tipo_usuario') === 'medico')
                    <p class="user-name">{{ session('usuario')->Nombres_PM }} {{ session('usuario')->Apellido_P_PM }}</p>
                    <p class="user-role">Personal Médico</p>
                <!-- Para Paciente -->
                @elseif(session('tipo_usuario') === 'paciente')
                    <p class="user-name">{{ session('usuario')->Nombres }} {{ session('usuario')->Apellido_P }}</p>
                    <p class="user-role">Paciente</p>
                @endif
            </div>
        @else
            <div class="sidebar-profile">
                <i class="fas fa-user-circle"></i>
                <p class="user-name"><a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a></p>
            </div>
        @endif
    </div>
    
    <ul>
        @if(session()->has('usuario'))
            @if(session('tipo_usuario') === 'medico')
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('pacientes.index') }}"><i class="fa fa-users"></i> Pacientes</a></li>
                <li><a href="{{ route('hospitales.index') }}"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="{{ route('personal_medico.index') }}"><i class="fa fa-user-md"></i> Personal Médico</a></li>
                <li><a href="{{ route('fichas.index') }}"><i class="fa fa-file-medical"></i> Fichas Médicas</a></li>
                <li><a href="https://ciudadhumana.com/"><i class="fas fa-globe"></i> Pagina Oficial</a></li>
                <!-- MODO OSCURO -->
                <li><a href="#" id="darkModeToggle"><i class="fas fa-moon"></i> Modo Oscuro</a></li>
            @elseif(session('tipo_usuario') === 'paciente')
                <!-- Menú para pacientes -->
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('perfil') }}"><i class="fa fa-user"></i> Mi Perfil</a></li>
                <li><a href="{{ route('fichas.index') }}"><i class="fa fa-calendar"></i> Mis Citas</a></li>
                <li><a href="{{ route('historial_medico.index') }}"><i class="fa fa-notes-medical"></i> Mi Historial Médico</a></li>
                <li><a href="{{ route('fichas.create') }}"><i class="fa fa-file-medical"></i> Nueva Ficha Médica</a></li>
                <li><a href="https://ciudadhumana.com/"><i class="fas fa-globe"></i> Pagina Oficial</a></li>
                <!-- MODO OSCURO -->
                <li><a href="#" id="darkModeToggle"><i class="fas fa-moon"></i> Modo Oscuro</a></li>
            @endif
            @else
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('hospitales.index') }}"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="https://ciudadhumana.com/"><i class="fas fa-globe"></i> Pagina Oficial</a></li>
                <li><a href="#" id="darkModeToggle"><i class="fas fa-moon"></i> Modo Oscuro</a></li>
                
        @endif
    </ul>
    
    <div class="sidebar-logout">
        @if(session()->has('usuario'))
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar Sesión
            </button>
        </form>
        @endif
    </div>
    
</aside>


<!-- Overlay para cerrar el sidebar en móviles -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>
<!--  ESTA PARTE DEBE COPIARSE EN TODOS LAS PAGINAS -->





    <div class="main-content" id="mainContent">
        <nav>

            <div class="menu-toggle" onclick="toggleSidebar()">☰</div>
            
            <h1>FICHAS MEDICAS</h1>
    
            <div class="social-icons">
                <a href="https://twitter.com" target="_blank"><i class="fab fa-x-twitter"></i></a>
                <a href="https://www.instagram.com/ciudad_humana/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/p/Ciudad-Humana-61561362172669/" target="_blank"><i class="fab fa-facebook"></i></a>
            </div>
        </nav>
        <nav class="nav2">
            @if(session()->has('usuario'))
            @if(session('tipo_usuario') === 'medico')
            <ul class="nav-links">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('perfil') }}"><i class="fa fa-user"></i> Mi Perfil</a></li>
                <li><a href="{{ route('pacientes.index') }}"><i class="fa fa-users"></i> Pacientes</a></li>
                <li><a href="{{ route('hospitales.index') }}"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="{{ route('personal_medico.index') }}"><i class="fa fa-users"></i> Personal Medico</a></li>
                <li><a href="{{ route('fichas.index') }}"><i class="fa fa-file-medical"></i> Fichas Médicas</a></li>
            </ul>
            @elseif(session('tipo_usuario') === 'paciente')
            <ul class="nav-links">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('perfil') }}"><i class="fa fa-user"></i> Mi Perfil</a></li>
                <li><a href="{{ route('historial_medico.index') }}"><i class="fa fa-notes-medical"></i> Mi Historial Médico</a></li>
                <li><a href="{{ route('fichas.index') }}"><i class="fa fa-calendar"></i> Mis Citas</a></li>
                <li><a href="{{ route('fichas.create') }}"><i class="fa fa-file-medical"></i> Nueva Ficha Médica</a></li>
            </ul>
            @endif
            @else
            <ul class="nav-links">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('hospitales.index') }}"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="https://ciudadhumana.com/"><i class="fas fa-globe"></i> Pagina Oficial</a></li>
            </ul>
            @endif
        </nav>
    </div>
    


    <div id="floating-menu">
        
        <div class="main-content" id="mainContent">
            <nav>

            <div class="menu-toggle" onclick="toggleSidebar()">☰</div>
            
            <h1>FICHAS MEDICAS</h1>
    
            <div class="social-icons">
                <a href="https://twitter.com" target="_blank"><i class="fab fa-x-twitter"></i></a>
                <a href="https://www.instagram.com/ciudad_humana/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/p/Ciudad-Humana-61561362172669/" target="_blank"><i class="fab fa-facebook"></i></a>
            </div>
        </nav>
        <nav class="nav2">
            @if(session()->has('usuario'))
            @if(session('tipo_usuario') === 'medico')
            <ul class="nav-links">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('perfil') }}"><i class="fa fa-user"></i> Mi Perfil</a></li>
                <li><a href="{{ route('pacientes.index') }}"><i class="fa fa-users"></i> Pacientes</a></li>
                <li><a href="{{ route('hospitales.index') }}"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="{{ route('personal_medico.index') }}"><i class="fa fa-users"></i> Personal Medico</a></li>
                <li><a href="{{ route('fichas.index') }}"><i class="fa fa-file-medical"></i> Fichas Médicas</a></li>
            </ul>
            @elseif(session('tipo_usuario') === 'paciente')
            <ul class="nav-links">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('perfil') }}"><i class="fa fa-user"></i> Mi Perfil</a></li>
                <li><a href="{{ route('historial_medico.index') }}"><i class="fa fa-notes-medical"></i> Mi Historial Médico</a></li>
                <li><a href="{{ route('fichas.index') }}"><i class="fa fa-calendar"></i> Mis Citas</a></li>
                <li><a href="{{ route('fichas.create') }}"><i class="fa fa-file-medical"></i> Nueva Ficha Médica</a></li>
            </ul>
            @endif
            @else
            <ul class="nav-links">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('hospitales.index') }}"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="https://ciudadhumana.com/"><i class="fas fa-globe"></i> Pagina Oficial</a></li>
            </ul>
            @endif
        </nav>
        </div>
        
    </div>
    


<main>
    @yield('content')
</main>

<footer>
    <div>
        <h4>Contacto</h4>
        <ul style="list-style: none; padding: 0; color: #c6d4df;">
            <li>Email: weymar752@gmail.com</li>
            <li>Tel: +591 65623943</li>
        </ul>
    </div>
    <div>
        <h4>Síguenos</h4>
        <div>
            <a href="https://www.facebook.com/p/Ciudad-Humana-61561362172669/" target="_blank" style="color: #c6d4df; margin: 0 10px;"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/ciudad_humana/" target="_blank" style="color: #c6d4df; margin: 0 10px;"><i class="fab fa-instagram"></i></a>
            <a href="https://www.twitter.com/" target="_blank" style="color: #c6d4df; margin: 0 10px;"><i class="fab fa-x-twitter"></i></a>
            <a href="https://www.youtube.com/" target="_blank" style="color: #c6d4df; margin: 0 10px;"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div style="margin-top: 12px; color: #c6d4df;">
        <p>&copy; todos los derechos reservados.</p>
    </div>
</footer>

<script src="{{ asset('js/site.js') }}"></script>
</body>

</html>