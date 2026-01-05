# 📋 Instrucciones de Despliegue en Render - ACTUALIZADO

## ✅ Cambios Realizados

### 1. **Corrección de Migración Historial_Medico**
- **Problema**: La migración se ejecutaba ANTES de Ficha_Medica
- **Solución**: Renombrado de `2025_11_12_0000010_create_Historial_Medico_table.php` a `2025_11_12_000011_create_Historial_Medico_table.php`
- **Resultado**: Ahora se ejecuta en el orden correcto

### 2. **Orden de Migraciones Correcto:**
```
✓ 000001 - Hospital
✓ 000002 - Salas
✓ 000003 - Departamento
✓ 000004 - Unidad
✓ 000005 - Especialidad
✓ 000006 - Categoria
✓ 000007 - Personal_Medico
✓ 000008 - Paciente
✓ 000009 - Ficha_Medica
✓ 000011 - Historial_Medico ← CORREGIDO
✓ 195042 - Sessions
```

### 3. **Seeders Incluidos en Dockerfile**
El Dockerfile ahora ejecuta automáticamente:
```dockerfile
php artisan migrate --force && \
php artisan db:seed --force && \
apache2-foreground
```

### 4. **Seeders Configurados:**
- ✓ HospitalSeeder
- ✓ SalaSeeder
- ✓ DepartamentoSeeder
- ✓ UnidadSeeder
- ✓ EspecialidadSeeder
- ✓ CategoriaSeeder
- ✓ PersonalMedicoSeeder
- ✓ PacienteSeeder
- ✓ FichaMedicaSeeder
- ✓ HistorialMedicoSeeder

## 🚀 Pasos para Desplegar

### 1. Preparar el Repositorio Git

```bash
# Agregar todos los cambios
git add .

# Commit con mensaje descriptivo
git commit -m "Fix: Orden de migración Historial_Medico y seeders automáticos"

# Subir a GitHub
git push origin main
```

### 2. Configurar Variables de Entorno en Render

Ve al Dashboard de Render → Environment Variables y configura:

#### ⚠️ Variables Obligatorias (Agregar manualmente):

```
APP_KEY=base64:TU_CLAVE_AQUI
DB_PASSWORD=TU_PASSWORD_BD
```

**Para generar APP_KEY localmente:**
```bash
php artisan key:generate --show
```

#### ✅ Variables Ya Configuradas en render.yaml:
- APP_ENV=production
- APP_DEBUG=false
- APP_URL=$RENDER_EXTERNAL_URL
- LOG_CHANNEL=stderr
- LOG_LEVEL=debug
- SESSION_DRIVER=database
- DB_CONNECTION=pgsql
- DB_HOST=dpg-d56u8tu3jp1c73akpk6g-a.oregon-postgres.render.com
- DB_PORT=5432
- DB_DATABASE=hospital_ii2p
- DB_USERNAME=hospital_ii2p_user

### 3. Desplegar en Render

#### Opción A: Auto-Deploy (Si está configurado)
1. Render detectará el push a GitHub
2. Iniciará automáticamente el despliegue
3. Tardará ~5-10 minutos

#### Opción B: Manual
1. Ve al dashboard de Render
2. Selecciona el servicio "hospital-app"
3. Click en "Manual Deploy" → "Deploy latest commit"

### 4. Verificar el Despliegue

#### En los Logs de Render verás:

```
Building...
[Docker] Building image...
[Docker] Running migrations...
   INFO  Running migrations.
   2025_11_12_000001_create_Hospital_table ................. DONE
   2025_11_12_000002_create_Salas_table .................... DONE
   ...
   2025_11_12_000011_create_Historial_Medico_table ......... DONE ✓
   
[Docker] Seeding database...
   INFO  Seeding database.
   Database\Seeders\HospitalSeeder ......................... DONE
   Database\Seeders\PacienteSeeder ......................... DONE
   ...
   
[Docker] Starting Apache...
Server running at https://hospital-app.onrender.com
```

#### Verificar la Aplicación:

1. Abre: `https://hospital-app.onrender.com`
2. Deberías ver la página principal con:
   - Contador de hospitales
   - Contador de doctores
   - Contador de pacientes
3. Navega a las rutas:
   - `/hospitales` - Ver hospitales
   - `/pacientes` - Ver pacientes
   - `/personal_medico` - Ver personal médico
   - `/fichas` - Ver fichas médicas
   - `/historial_medico/{ciPaciente}` - Ver historial

## 🔧 Comandos de Mantenimiento Local

### Recrear BD completa con seeders:
```bash
php artisan migrate:fresh --seed --force
```

### Ver estado de migraciones:
```bash
php artisan migrate:status
```

### Verificar datos insertados:
```bash
php artisan tinker
>>> App\Models\Hospital::count();
>>> App\Models\Paciente::count();
>>> App\Models\Historial_Medico::count();
```

### Ver estructura de BD:
```bash
php artisan db:show
```

## 📊 Estructura de Dependencias

```
Hospital (base)
  ├── Salas
  ├── Departamento
  │   └── Unidad
  │       ├── Personal_Medico
  │       │   ├── Ficha_Medica
  │       │   └── Historial_Medico
  │       └── Ficha_Medica
  │           └── Historial_Medico ← Depende de Ficha_Medica
  ├── Especialidad
  │   └── Personal_Medico
  └── Categoria
      └── Personal_Medico

Paciente (independiente)
  ├── Ficha_Medica
  └── Historial_Medico
```

## ⚠️ Solución de Problemas

### Error: "Undefined table: Ficha_Medica"
**Causa**: Migración de Historial_Medico se ejecuta antes de Ficha_Medica
**Solución**: Ya corregido con el nuevo nombre `000011`

### Error: "No data in database"
**Causa**: Seeders no se ejecutaron
**Solución**: Verifica que el Dockerfile incluya `php artisan db:seed --force`

### Error: "Connection refused"
**Causa**: Variables de entorno incorrectas
**Solución**: Verifica APP_KEY y DB_PASSWORD en Render Dashboard

### Error 500 en producción
1. Revisa logs: Render Dashboard → Logs
2. Verifica `LOG_CHANNEL=stderr` esté configurado
3. Revisa que todas las migraciones se ejecutaron

## 🎯 Checklist Final

Antes de hacer push a producción:

- [ ] Archivo de migración renombrado a `000011`
- [ ] Todas las migraciones pasan localmente
- [ ] Seeders funcionan correctamente
- [ ] `APP_KEY` generado y guardado
- [ ] `DB_PASSWORD` configurado en Render
- [ ] Git commit y push realizados
- [ ] Variables de entorno verificadas en Render
- [ ] Logs de Render revisados después del deploy
- [ ] Aplicación accesible y funcional

## 📝 Archivos Modificados

1. ✅ `database/migrations/2025_11_12_000011_create_Historial_Medico_table.php` (renombrado)
2. ✅ `Dockerfile` (agregado `db:seed --force`)
3. ✅ `render.yaml` (actualizado variables de entorno)
4. ✅ `routes/web.php` (organizado y limpio)

## 🔗 URLs Importantes

- Dashboard Render: https://dashboard.render.com
- App en producción: https://hospital-app.onrender.com
- Base de datos: dpg-d56u8tu3jp1c73akpk6g-a.oregon-postgres.render.com

---

**Última actualización**: 4 de enero de 2026
**Estado**: ✅ Listo para despliegue
