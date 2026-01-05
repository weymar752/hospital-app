# 🗄️ Gestionar Base de Datos en Render

## 📋 Estado Actual

Tu BD tiene **datos duplicados** porque se ejecutaron migraciones y seeders múltiples veces.

## 🧹 Limpiar la BD de Render (Opción Recomendada)

### Pasos:

1. **Ve al Dashboard de Render**
   - https://dashboard.render.com

2. **Selecciona tu base de datos PostgreSQL** → `hospital_ii2p`

3. **Click en "Info"** → busca el botón de conexión o acceso

4. **Opción A: Usar pgAdmin (Si está disponible)**
   - Selecciona todas las tablas
   - Click derecho → Delete
   - Confirma

5. **Opción B: Comando SQL directo**
   ```sql
   -- Conectarse a la BD e ejecutar esto:
   DROP TABLE IF EXISTS "Historial_Medico" CASCADE;
   DROP TABLE IF EXISTS "Ficha_Medica" CASCADE;
   DROP TABLE IF EXISTS "Personal_Medico" CASCADE;
   DROP TABLE IF EXISTS "Paciente" CASCADE;
   DROP TABLE IF EXISTS "Categoria" CASCADE;
   DROP TABLE IF EXISTS "Especialidad" CASCADE;
   DROP TABLE IF EXISTS "Unidad" CASCADE;
   DROP TABLE IF EXISTS "Departamento" CASCADE;
   DROP TABLE IF EXISTS "Salas" CASCADE;
   DROP TABLE IF EXISTS "Hospital" CASCADE;
   DROP TABLE IF EXISTS "sessions" CASCADE;
   DROP TABLE IF EXISTS "migrations" CASCADE;
   ```

## 🚀 Después de Limpiar (Opción Recomendada)

### En tu máquina local:

```bash
# 1. Hacer deploy limpio (sin migraciones)
git add Dockerfile
git commit -m "Dockerfile: Sin auto-migrations, gestión manual"
git push origin main

# Espera a que Render termine el despliegue
```

## 📱 Ejecutar Migraciones y Seeders Manualmente

### Una vez que Render esté listo:

```bash
# 1. SSH a Render (si está disponible)
#    O usa estos comandos en tu terminal local conectado a Render

# 2. Ejecutar migraciones
php artisan migrate:fresh --force

# 3. Ejecutar seeders
php artisan db:seed --force

# 4. Verificar que todo funcionó
php artisan migrate:status
```

## 🔄 Alternativa: Ejecutar Localmente y Sincronizar

Si no puedes acceder a Render vía SSH:

```bash
# 1. Local: Hacer migraciones y seeders
php artisan migrate:fresh --seed

# 2. Exportar datos (si necesitas respaldar)
pg_dump -U usuario -h localhost hospital > backup.sql

# 3. Hacer push a GitHub
git add .
git commit -m "Changes"
git push origin main

# 4. Render deployará automáticamente (sin migrations automáticas)
```

## ⚙️ Opciones en Render

### Opción 1: Usar Shell de Render
1. Ve a tu servicio en Render
2. Click en "Shell" (terminal web)
3. Ejecuta:
   ```bash
   php artisan migrate:fresh --force
   php artisan db:seed --force
   ```

### Opción 2: Conectarse vía SSH
```bash
# Si tienes clave SSH configurada en Render
ssh user@your-render-app.onrender.com

# Luego ejecuta los mismos comandos
php artisan migrate:fresh --force
php artisan db:seed --force
```

### Opción 3: Usar SQL directo (pgAdmin)
1. Abre pgAdmin
2. Conecta a: `dpg-d56u8tu3jp1c73akpk6g-a.oregon-postgres.render.com`
3. Usuario: `hospital_ii2p_user`
4. BD: `hospital_ii2p`
5. Ejecuta el SQL de DROP que viene arriba

## 📊 Verificar Estado de la BD

### Localmente:
```bash
# Ver tablas
php artisan db:show

# Ver migraciones
php artisan migrate:status

# Contar registros
php artisan tinker
>>> App\Models\Hospital::count();
>>> App\Models\Paciente::count();
```

## ✅ Checklist Post-Limpieza

- [ ] BD de Render limpiada (todas las tablas eliminadas)
- [ ] Dockerfile sin auto-migrations
- [ ] Push a GitHub realizado
- [ ] Render terminó el despliegue
- [ ] Ejecutaste `migrate:fresh --force` en Render
- [ ] Ejecutaste `db:seed --force` en Render
- [ ] Aplicación funciona en https://hospital-app.onrender.com
- [ ] Datos de prueba visibles (hospitales, pacientes, etc)

## 🔒 Notas Importantes

1. **NUNCA** ejecutes `migrate:fresh` en producción sin un backup
2. **SIEMPRE** verifica que tengas respaldo de datos importantes
3. El Dockerfile ahora **NO** ejecutará migraciones automáticamente
4. Tú tienes control total sobre cuándo ejecutar migraciones/seeders

## 💡 Recomendación

Usa este orden:
1. Limpia BD de Render (elimina todas las tablas)
2. Deploy nuevo (sin migrations automáticas)
3. Ejecuta manualmente: `php artisan migrate:fresh --seed --force`
4. Verifica que todo funcione
5. Futuros deploys no limpiarán la BD

---

**Última actualización**: 4 de enero de 2026
**Estado**: Listo para gestión manual
