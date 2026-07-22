# EAGRCancionesAPI

API REST desarrollada con **Laravel** para gestionar usuarios y canciones.

El proyecto utiliza **Laravel Sanctum** para la autenticación mediante tokens, **MySQL** como base de datos y **Bruno** para probar los endpoints.

## Autor

**Edsai Alejandro García Reyes**

## Descripción

La API permite:

- Registrar usuarios.
- Iniciar sesión.
- Consultar al usuario autenticado.
- Cerrar sesión.
- Crear canciones.
- Listar canciones.
- Consultar una canción por ID.
- Actualizar canciones.
- Eliminar canciones.

Cada canción pertenece al usuario que la creó, por lo que un usuario no puede modificar ni eliminar canciones de otra cuenta.

## Tecnologías utilizadas

- PHP 8.3
- Laravel 13
- Laravel Sanctum
- MySQL
- Eloquent ORM
- Bruno
- Nginx
- Ubuntu Server
- Git y GitHub

## API desplegada

La API está publicada en el VPS:

```text
http://82.25.93.110:8082/api
```

## Repositorio

```text
https://github.com/EdsaiGarrey/EAGRCancionesAPI
```

## Endpoints principales

### Autenticación

| Método | Endpoint | Descripción |
|---|---|---|
| POST | `/api/register` | Registrar usuario |
<img width="1672" height="644" alt="image" src="https://github.com/user-attachments/assets/5d577e41-9119-46d5-bd11-c1edfc30d44c" />

| POST | `/api/login` | Iniciar sesión |
| GET | `/api/me` | Consultar usuario autenticado |
| POST | `/api/logout` | Cerrar sesión |

### Canciones

| Método | Endpoint | Descripción |
|---|---|---|
| POST | `/api/canciones` | Crear canción |
| GET | `/api/canciones` | Listar canciones |
| GET | `/api/canciones/{id}` | Consultar canción |
| PATCH | `/api/canciones/{id}` | Actualizar canción |
| DELETE | `/api/canciones/{id}` | Eliminar canción |

Las rutas de canciones requieren un token Bearer generado durante el registro o el inicio de sesión.

## Ejemplo de registro

```json
{
  "name": "Edsai Garcia",
  "email": "usuario@example.com",
  "password": "Canciones2026#",
  "password_confirmation": "Canciones2026#"
}
```

## Ejemplo de canción

```json
{
  "titulo": "Amanecer en la Sierra",
  "artista": "Edsai Garcia",
  "album": "Raíces de Oaxaca",
  "genero": "Regional Mexicano",
  "duracion_segundos": 245,
  "idioma": "Español",
  "precio": 22.50,
  "calificacion": 4.7,
  "reproducciones": 85000,
  "explicita": false,
  "disponible": true
}
```

## Pruebas con Bruno

La colección de Bruno se encuentra en:

```text
bruno/API Canciones EAGR
```

Orden recomendado de pruebas:

1. Registrar usuario.
2. Iniciar sesión.
3. Copiar el token generado.
4. Consultar al usuario autenticado.
5. Crear una canción.
6. Listar canciones.
7. Consultar una canción.
8. Actualizarla.
9. Eliminarla.
10. Cerrar sesión.

## Base de datos

La base de datos utilizada en producción es:

```text
eagr_canciones_api
```

Las tablas principales son:

- `users`
- `canciones`
- `personal_access_tokens`

## Seguridad

El repositorio no debe incluir:

- Archivo `.env`
- Contraseñas
- Tokens reales
- Credenciales de MySQL
- Datos de acceso al VPS

## Estado del proyecto

- API funcional.
- Autenticación con Laravel Sanctum.
- CRUD de canciones completo.
- Base de datos MySQL conectada.
- Pruebas realizadas con Bruno.
- Proyecto desplegado en VPS con Nginx.
