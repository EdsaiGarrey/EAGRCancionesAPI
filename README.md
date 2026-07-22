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
<img width="1592" height="611" alt="image" src="https://github.com/user-attachments/assets/abf69e10-8cd3-493b-966c-1150d207ffaa" />

| GET | `/api/me` | Consultar usuario autenticado |
<img width="1913" height="658" alt="image" src="https://github.com/user-attachments/assets/e28c9a67-e468-46e9-a5d9-7e85e4755716" />

| POST | `/api/logout` | Cerrar sesión |
<img width="1527" height="389" alt="image" src="https://github.com/user-attachments/assets/510ce25e-7c22-4f14-bb16-65d41527ede1" />

### Canciones

| Método | Endpoint | Descripción |
|---|---|---|
| POST | `/api/canciones` | Crear canción |
<img width="1644" height="874" alt="image" src="https://github.com/user-attachments/assets/0c45980d-bafb-4934-962d-a96a92efc6e8" />

| GET | `/api/canciones` | Listar canciones |

| GET | `/api/canciones/{id}` | Consultar canción |
<img width="1521" height="901" alt="image" src="https://github.com/user-attachments/assets/f6eb7a37-82c2-4cc2-9607-1505bac74181" />

| PATCH | `/api/canciones/{id}` | Actualizar canción |
<img width="1625" height="850" alt="image" src="https://github.com/user-attachments/assets/21eb73b5-e2c6-4b9d-a02e-e0eb974ae0b5" />

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
  <img width="1914" height="968" alt="image" src="https://github.com/user-attachments/assets/220852f9-85de-4225-8b61-e388b01e8bf3" />


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
