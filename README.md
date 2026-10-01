# Voz UPVM

Aplicación PHP/MySQL con encuesta estudiantil UPVM y gestión CRUD de productos.

## Configuración de base de datos

La conexión unificada lee estas variables de entorno:

- `DB_HOST`
- `DB_USER`
- `DB_PASS`
- `DB_NAME` (base de la encuesta)
- `DB_CRUD_NAME` (base del CRUD de productos)
- `DB_PORT` (por defecto `3306`)

La encuesta guarda respuestas en `DB_NAME` y el CRUD guarda productos en `DB_CRUD_NAME`; ambos usan el mismo host, usuario, contraseña y puerto. En InfinityFree, según los nombres de tu panel, configura `DB_HOST=sql103.infinityfree.com`, `DB_USER=if0_42883200`, `DB_NAME=if0_42883200_Encuesta`, `DB_CRUD_NAME=if0_42883200_HOLA_MUNDO` y `DB_PORT=3306`. Establece `DB_PASS` con la contraseña actual desde la configuración privada del servidor, nunca en el código fuente.

Importa `db.sql` únicamente en la base de la encuesta y `productos.sql` únicamente en la base del CRUD. Para Docker o Render, define las mismas variables en la configuración de entorno del servicio.

La encuesta tiene cinco preguntas y guarda las respuestas en `respuestas`. El CRUD crea, lista, actualiza y elimina filas de `productos`; la lista conserva los mapas de Google Maps.

## Ejecutar localmente en Windows con AppServ

1. Para probar las bases locales de AppServ, abre phpMyAdmin en `http://localhost/phpMyAdmin/`, inicia sesión y crea dos bases, por ejemplo `encuesta` y `productos`. Importa `db.sql` en `encuesta` e importa `productos.sql` en `productos`. El usuario `root` sin contraseña fue rechazado en este equipo.
2. Detén el servidor PHP actual con `Ctrl+C`. En PowerShell, configura las variables de tus bases locales (no las de InfinityFree) y vuelve a iniciar PHP:

```powershell
$env:DB_HOST = '127.0.0.1'
$env:DB_USER = 'root'
$env:DB_PASS = 'ESCRIBE_AQUI_TU_CONTRASENA_MYSQL'
$env:DB_NAME = 'encuesta'
$env:DB_CRUD_NAME = 'productos'
$env:DB_PORT = '3306'
php -S 127.0.0.1:8765
```

Reemplaza el valor de ejemplo de `DB_PASS` en tu terminal; no lo compartas ni lo guardes en el repositorio. Después abre `http://127.0.0.1:8765/`.
