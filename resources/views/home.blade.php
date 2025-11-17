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
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/pacientes"><i class="fa fa-users"></i> Pacientes</a></li>
                <li><a href="/Hospital/public/hospitales"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="/Hospital/public/personal_medico"><i class="fa fa-user-md"></i> Personal Médico</a></li>
                <li><a href="/Hospital/public/fichas"><i class="fa fa-file-medical"></i> Fichas Médicas</a></li>
                <li><a href="https://ciudadhumana.com/"><i class="fas fa-globe"></i> Pagina Oficial</a></li>
                <!-- MODO OSCURO -->
                <li><a href="#" id="darkModeToggle"><i class="fas fa-moon"></i> Modo Oscuro</a></li>
            @elseif(session('tipo_usuario') === 'paciente')
                <!-- Menú para pacientes -->
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
                <li><a href="/Hospital/public/fichas"><i class="fa fa-calendar"></i> Mis Citas</a></li>
                <li><a href="/Hospital/public/fichas/create"><i class="fa fa-file-medical"></i> Nueva Ficha Médica</a></li>
                <li><a href="https://ciudadhumana.com/"><i class="fas fa-globe"></i> Pagina Oficial</a></li>
                <!-- MODO OSCURO -->
                <li><a href="#" id="darkModeToggle"><i class="fas fa-moon"></i> Modo Oscuro</a></li>
            @endif
            @else
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/hospitales"><i class="fas fa-hospital"></i> Hospitales</a></li>
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
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/pacientes"><i class="fa fa-users"></i> Pacientes</a></li>
                <li><a href="/Hospital/public/hospitales"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="/Hospital/public/personal_medico"><i class="fa fa-users"></i> Personal Medico</a></li>
                <li><a href="/Hospital/public/fichas"><i class="fa fa-file-medical"></i> Fichas Médicas</a></li>
            </ul>
            @elseif(session('tipo_usuario') === 'paciente')
            <ul class="nav-links">
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
                <li><a href="/Hospital/public/fichas"><i class="fa fa-calendar"></i> Mis Citas</a></li>
                <li><a href="/Hospital/public/fichas/create"><i class="fa fa-file-medical"></i> Nueva Ficha Médica</a></li>
            </ul>
            @endif
            @else
            <ul class="nav-links">
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/hospitales"><i class="fas fa-hospital"></i> Hospitales</a></li>
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
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/pacientes"><i class="fa fa-users"></i> Pacientes</a></li>
                <li><a href="/Hospital/public/hospitales"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="/Hospital/public/personal_medico"><i class="fa fa-users"></i> Personal Medico</a></li>
                <li><a href="/Hospital/public/fichas"><i class="fa fa-file-medical"></i> Fichas Médicas</a></li>
            </ul>
            @elseif(session('tipo_usuario') === 'paciente')
            <ul class="nav-links">
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
                <li><a href="/Hospital/public/fichas"><i class="fa fa-calendar"></i> Mis Citas</a></li>
                <li><a href="/Hospital/public/fichas/create"><i class="fa fa-file-medical"></i> Nueva Ficha Médica</a></li>
            </ul>
            @endif
            @else
            <ul class="nav-links">
                <li><a href="/Hospital/public/"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="/Hospital/public/hospitales"><i class="fas fa-hospital"></i> Hospitales</a></li>
                <li><a href="https://ciudadhumana.com/"><i class="fas fa-globe"></i> Pagina Oficial</a></li>
            </ul>
            @endif
        </nav>
        </div>
        
    </div>
    




<main>
    <div class="form-container">
        <!-- HERO SECTION -->
        <div class="hero-section">
            <h1 class="hero-title">Sistema de Fichas Médicas</h1>
            <p class="hero-subtitle">Gestión integral de salud digital</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <i class="fas fa-hospital"></i>
                    <span class="stat-number">{{ $hospitalCount ?? '15' }}</span>
                    <span class="stat-label">Hospitales</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-user-md"></i>
                    <span class="stat-number">{{ $doctorCount ?? '120' }}</span>
                    <span class="stat-label">Médicos</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <span class="stat-number">{{ $patientCount ?? '2.5k' }}</span>
                    <span class="stat-label">Pacientes</span>
                </div>
            </div>
        </div>

        <!-- BOTONES PRINCIPALES -->
        <div class="action-grid">
            @if(!session()->has('usuario'))
                <!-- Para usuarios no logueados -->
                <div class="action-card" onclick="location.href='/Hospital/public/login'">
                    <div class="action-icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <h3>Iniciar Sesión</h3>
                    <p>Accede a tu cuenta para gestionar tu salud</p>
                    <div class="action-badge">Acceso Seguro</div>
                </div>

                <div class="action-card" onclick="location.href='/Hospital/public/hospitales'">
                    <div class="action-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h3>Hospitales</h3>
                    <p>Descubre los centros médicos disponibles</p>
                    <div class="action-badge">Ver Lista</div>
                </div>

                <div class="action-card" onclick="location.href='https://ciudadhumana.com/'">
                    <div class="action-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Sitio Web Oficial</h3>
                    <p>Conoce más sobre nuestros servicios</p>
                    <div class="action-badge">Externo</div>
                </div>

                <div class="action-card" onclick="location.href='/Hospital/public/pacientes/create'">
                    <div class="action-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3>Registrarse</h3>
                    <p>Crear nuevo registro de paciente en el sistema</p>
                    <div class="action-badge">Nuevo</div>
                </div>

            @else
                <!-- Para usuarios logueados -->
                @if(session('tipo_usuario') === 'medico')
                    <div class="action-card" onclick="location.href='/Hospital/public/pacientes'">
                        <div class="action-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Gestión de Pacientes</h3>
                        <p>Administra la información de tus pacientes</p>
                        <div class="action-badge">Médico</div>
                    </div>

                    <div class="action-card" onclick="location.href='/Hospital/public/pacientes/create'">
                        <div class="action-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3>Registrar Paciente</h3>
                        <p>Crear nuevo registro de paciente</p>
                        <div class="action-badge">Nuevo</div>
                    </div>

                    <div class="action-card" onclick="location.href='/Hospital/public/fichas'">
                        <div class="action-icon">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <h3>Fichas Médicas</h3>
                        <p>Consulta y edita historiales médicos</p>
                        <div class="action-badge">Historial</div>
                    </div>

                @elseif(session('tipo_usuario') === 'paciente')
                    <div class="action-card" onclick="location.href='/Hospital/public/perfil'">
                        <div class="action-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3>Mi Perfil</h3>
                        <p>Actualiza tu información personal</p>
                        <div class="action-badge">Personal</div>
                    </div>

                    <div class="action-card" onclick="location.href='/Hospital/public/citas'">
                        <div class="action-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <h3>Mis Citas</h3>
                        <p>Gestiona tus próximas consultas médicas</p>
                        <div class="action-badge">Próximas</div>
                    </div>

                    <div class="action-card" onclick="location.href='/Hospital/public/fichas/create'">
                        <div class="action-icon">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <h3>Sacar Nueva Ficha Médica</h3>
                        <p>Crea una nueva Ficha Médica</p>
                        <div class="action-badge">Nuevo</div>
                    </div>
                @endif

                <div class="action-card" onclick="location.href='/Hospital/public/hospitales'">
                    <div class="action-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h3>Hospitales</h3>
                    <p>Encuentra centros médicos cercanos</p>
                    <div class="action-badge">Disponible</div>
                </div>

                <div class="action-card" onclick="location.href='https://ciudadhumana.com/'">
                    <div class="action-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Sitio Oficial</h3>
                    <p>Visita nuestra página web principal</p>
                    <div class="action-badge">Externo</div>
                </div>
            @endif
        </div>

        <!-- INFORMACIÓN ADICIONAL -->
        <div class="info-section">
            <h2>¿Por qué elegir nuestro sistema?</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Seguro y Confiable</h4>
                    <p>Tus datos médicos están protegidos con los más altos estándares de seguridad</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-bolt"></i>
                    <h4>Acceso Rápido</h4>
                    <p>Consulta tu información médica en cualquier momento y lugar</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-heartbeat"></i>
                    <h4>Salud Integral</h4>
                    <p>Gestión completa de tu historial médico y citas</p>
                </div>
            </div>
        </div>
    </div>
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