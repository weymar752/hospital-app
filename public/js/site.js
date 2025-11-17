        // Script para mostrar y ocultar la barra lateral
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('mainContent').classList.toggle('active');
    }

    // Script para mostrar y ocultar submenús dentro de la barra lateral
    function toggleSubMenu(event) {
        event.preventDefault();
        const parent = event.target.parentElement;
        parent.classList.toggle('active');
    }

        // Script para manejar la visibilidad de la barra lateral al hacer scroll
    let lastScrollTopSidebar = 0;
    window.addEventListener("scroll", function() {
        let scrollTop = window.scrollY;
        if (scrollTop > lastScrollTopSidebar) {
            document.getElementById('sidebar').classList.remove('active');
            document.getElementById('mainContent').classList.remove('active');
        } else {
            document.getElementById('sidebar').classList.remove('active');
            document.getElementById('mainContent').classList.remove('active');
        }
        lastScrollTopSidebar = scrollTop;
    });

        // Script para mostrar/ocultar el menú flotante al hacer scroll
    let lastScrollTop = 0;
    let timeout = null;
    window.addEventListener("scroll", function() {
        let floatingMenu = document.getElementById("floating-menu");
        let scrollTop = window.scrollY;

        // Ocultar el menú flotante cuando el usuario haga scroll hacia abajo
        if (scrollTop > lastScrollTop) {
            floatingMenu.style.top = '-100px'; 
            floatingMenu.style.opacity = '0';
        }

        // Asegurar que el menú se mantenga oculto si el usuario hace scroll hacia arriba
        if (scrollTop < lastScrollTop) {
            floatingMenu.style.top = '-100px'; 
            floatingMenu.style.opacity = '0'; 
        }

        // Mostrar el menú flotante después de 3 segundos de inactividad
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            if (scrollTop > 100) { 
                floatingMenu.style.display = 'flex'; 
                setTimeout(() => {
                    floatingMenu.style.top = '0'; 
                    floatingMenu.style.opacity = '1'; 
                }, 10); 
            }
        }, 3000);
        
        lastScrollTop = scrollTop;
    });

    // modo oscuro

function setTheme(theme) {
    var link = document.getElementById('themeStylesheet');
    if (!link) return;
    link.href = (theme === 'dark') ? window.themeDark : window.themeLight;
    localStorage.setItem('theme', theme);
    // opcional: sincronizar clase en body si la usas en CSS
    document.body.classList.toggle('dark-theme', theme === 'dark');
}

document.addEventListener('DOMContentLoaded', function() {
    // asegurar estado inicial (por si usas .dark-theme en CSS)
    var saved = localStorage.getItem('theme') || 'light';
    document.body.classList.toggle('dark-theme', saved === 'dark');

    var btn = document.getElementById('darkModeToggle');
    if (btn) {
        btn.addEventListener('click', function() {
            var current = localStorage.getItem('theme') || 'light';
            setTheme(current === 'dark' ? 'light' : 'dark');
        });
    }
});
