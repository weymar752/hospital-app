# 🚀 Instrucciones de Despliegue - Hospital System

## OPCIÓN 1: RENDER.COM (Recomendada)

### Paso 1: Preparar el Proyecto
```bash
# En tu carpeta Hospital
git init
git add .
git commit -m "Initial commit"
```

### Paso 2: Subir a GitHub
1. Crea un repositorio en GitHub (puede ser privado)
2. Ejecuta:
```bash
git remote add origin https://github.com/TU_USUARIO/TU_REPO.git
git branch -M main
git push -u origin main
```

### Paso 3: Desplegar en Render
1. Ve a https://render.com y crea cuenta
2. Click en "New +" → "Web Service"
3. Conecta tu repositorio de GitHub
4. Render detectará automáticamente el `render.yaml`
5. Click en "Create Web Service"
6. Espera 5-10 minutos mientras se construye

### Paso 4: Configurar URL
Una vez desplegado, Render te dará una URL como:
`https://hospital-app-xxxx.onrender.com`

⚠️ **IMPORTANTE:** Actualiza el `APP_URL` en las variables de entorno de Render con tu URL real.

### Paso 5: Verificar
- Visita tu URL
- Prueba el login
- Verifica que se conecte a la base de datos PostgreSQL

---

## OPCIÓN 2: RAILWAY.APP

### Ventajas:
- Más simple que Render
- $5/mes de crédito gratuito
- Deploy automático desde GitHub

### Pasos:
1. Ve a https://railway.app
2. "Start a New Project" → "Deploy from GitHub repo"
3. Selecciona tu repositorio
4. Railway detectará Laravel automáticamente
5. Agrega las variables de entorno desde tu `.env`
6. Deploy automático

---

## OPCIÓN 3: DIGITALOCEAN APP PLATFORM

### Ventajas:
- Muy confiable
- Desde $5/mes
- Escalable

### Pasos:
1. Ve a https://www.digitalocean.com/products/app-platform
2. "Create App" → Conecta GitHub
3. Configura:
   - Build Command: `composer install --no-dev && npm ci && npm run build`
   - Run Command: `php artisan serve --host=0.0.0.0 --port=8080`
4. Agrega variables de entorno
5. Deploy

---

## 📋 Checklist Post-Deploy

- [ ] Verificar que APP_URL esté actualizado con la URL real
- [ ] Probar el login
- [ ] Verificar conexión a base de datos
- [ ] Probar crear/editar/eliminar registros
- [ ] Verificar que los assets CSS/JS carguen correctamente
- [ ] Probar desde celular

---

## 🔧 Comandos Útiles

### Ver logs en Render:
```bash
# En el dashboard de Render → Logs tab
```

### Ejecutar migraciones manualmente:
```bash
# En Render → Shell tab
php artisan migrate --force
```

### Limpiar caché:
```bash
php artisan optimize:clear
```

---

## 💰 Costos Estimados

| Hosting | Plan Recomendado | Costo Mensual | Notas |
|---------|------------------|---------------|-------|
| **Render** | Starter | $7/mes | Incluye SSL, 512MB RAM |
| **Railway** | Pro | $5/mes crédito | Paga por uso después |
| **DigitalOcean** | Basic | $5/mes | Muy estable |

**Render ya tiene tu BD PostgreSQL incluida** - Es la opción más sencilla.

---

## ⚠️ Problemas Comunes

### Error 500:
- Verifica APP_KEY en variables de entorno
- Revisa logs: `php artisan optimize:clear`

### CSS/JS no cargan:
- Ejecuta: `npm run build`
- Verifica que `public/build` exista en el repositorio

### Error de base de datos:
- Verifica credenciales DB en variables de entorno
- Asegúrate que la DB PostgreSQL en Render esté activa

---

## 📱 Acceso desde Celular

Una vez desplegado, simplemente abre la URL desde cualquier navegador:
- `https://tu-app.onrender.com`
- Funciona en iPhone, Android, tablets, etc.
- No requiere instalación de app
