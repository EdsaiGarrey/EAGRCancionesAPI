EAGRCancionesAPI

API REST desarrollada con Laravel para gestionar usuarios y canciones.El sistema utiliza Laravel Sanctum para autenticación mediante tokens, MySQL como base de datos y Bruno para realizar las pruebas de los endpoints.

Autor

Edsai Alejandro García Reyes

Descripción

El proyecto permite registrar usuarios, iniciar sesión y administrar canciones mediante operaciones CRUD:

Crear canciones.

Listar canciones.

Consultar una canción por ID.

Actualizar canciones.

Eliminar canciones.

Validar datos incorrectos.

Consultar al usuario autenticado.

Cerrar sesión y revocar el token actual.

Cada canción pertenece al usuario que la creó. Un usuario no puede consultar, modificar o eliminar canciones de otra cuenta.

Tecnologías utilizadas

PHP 8.3

Laravel 13

Laravel Sanctum

MySQL 8

Eloquent ORM

Nginx

Ubuntu Server 24.04

Bruno

Git y GitHub

Composer

API desplegada en VPS

La API está publicada en:

http://82.25.93.110:8082/api

Al abrir la URL principal debe responder un JSON similar a:

{
  "message": "API de canciones funcionando correctamente.",
  "status": "online",
  "version": "1.0",
  "endpoints": {
    "register": "/api/register",
    "login": "/api/login",
    "canciones": "/api/canciones"
  }
}

Repositorio

https://github.com/EdsaiGarrey/EAGRCancionesAPI

Funcionalidades principales

Autenticación

Registro de usuarios.

Inicio de sesión.

Generación de tokens Bearer.

Consulta del usuario autenticado.

Cierre de sesión.

Revocación del token actual.

Contraseñas cifradas.

Protección de rutas con auth:sanctum.

Gestión de canciones

Registro de canciones.

Listado paginado.

Consulta por ID.

Actualización parcial con PATCH.

Eliminación.

Validación de campos.

Protección por propietario.

Endpoints

Verificación del servidor

Método

Endpoint

Descripción

Autenticación

GET

/api

Verifica que la API esté en línea

No

Autenticación

Método

Endpoint

Descripción

Autenticación

POST

/api/register

Registra un usuario

No

POST

/api/login

Inicia sesión y genera un token

No

GET

/api/me

Consulta al usuario autenticado

Bearer Token

POST

/api/logout

Cierra sesión y elimina el token actual

Bearer Token

Canciones

Método

Endpoint

Descripción

Autenticación

POST

/api/canciones

Crea una canción

Bearer Token

GET

/api/canciones

Lista las canciones del usuario

Bearer Token

GET

/api/canciones/{id}

Consulta una canción

Bearer Token

PUT

/api/canciones/{id}

Reemplaza los datos de una canción

Bearer Token

PATCH

/api/canciones/{id}

Actualiza algunos campos

Bearer Token

DELETE

/api/canciones/{id}

Elimina una canción

Bearer Token

Ejemplos de peticiones

Registrar usuario

POST /api/register
Content-Type: application/json
Accept: application/json

{
  "name": "Edsai Garcia",
  "email": "usuario@example.com",
  "password": "Canciones2026#",
  "password_confirmation": "Canciones2026#"
}

Respuesta esperada:

201 Created

Iniciar sesión

POST /api/login
Content-Type: application/json
Accept: application/json

{
  "email": "usuario@example.com",
  "password": "Canciones2026#"
}

La respuesta contiene:

{
  "authentication": {
    "token_type": "Bearer",
    "access_token": "TOKEN_GENERADO"
  }
}

Crear canción

POST /api/canciones
Authorization: Bearer TOKEN
Content-Type: application/json
Accept: application/json

{
  "titulo": "Amanecer en la Sierra",
  "artista": "Edsai Garcia",
  "album": "Raíces de Oaxaca",
  "genero": "Regional Mexicano",
  "compositor": "Edsai Garcia",
  "sello_discografico": "Garrey Music",
  "fecha_lanzamiento": "2026-07-22",
  "duracion_segundos": 245,
  "numero_pista": 2,
  "idioma": "Español",
  "bpm": 102,
  "tonalidad": "Fa mayor",
  "precio": 22.50,
  "calificacion": 4.7,
  "reproducciones": 85000,
  "explicita": false,
  "disponible": true
}

Respuesta esperada:

201 Created

Listar canciones

GET /api/canciones
Authorization: Bearer TOKEN
Accept: application/json

Respuesta esperada:

200 OK

Consultar canción

GET /api/canciones/1
Authorization: Bearer TOKEN
Accept: application/json

Actualizar canción

PATCH /api/canciones/1
Authorization: Bearer TOKEN
Content-Type: application/json
Accept: application/json

{
  "precio": 24.90,
  "calificacion": 5,
  "reproducciones": 150000,
  "disponible": true
}

Eliminar canción

DELETE /api/canciones/1
Authorization: Bearer TOKEN
Accept: application/json

Validaciones

La API valida, entre otros, los siguientes campos:

Campo

Regla principal

titulo

Obligatorio, máximo 150 caracteres

artista

Obligatorio, máximo 150 caracteres

genero

Obligatorio

duracion_segundos

Entre 1 y 7200

idioma

Obligatorio

bpm

Entre 30 y 300

precio

Número mayor o igual a 0

calificacion

Entre 0 y 5

reproducciones

Entero mayor o igual a 0

explicita

Booleano

disponible

Booleano

Cuando los datos no son válidos, la API responde:

422 Unprocessable Entity

Códigos HTTP utilizados

Código

Significado

200 OK

Operación correcta

201 Created

Recurso creado

401 Unauthorized

Token ausente o inválido

404 Not Found

Recurso inexistente o no perteneciente al usuario

405 Method Not Allowed

Método HTTP incorrecto

422 Unprocessable Entity

Error de validación

500 Internal Server Error

Error interno de Laravel, MySQL o configuración

Estructura principal

EAGRCancionesAPI
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   └── Api
│   │   │       ├── AuthController.php
│   │   │       └── CancionController.php
│   │   ├── Requests
│   │   │   ├── StoreCancionRequest.php
│   │   │   └── UpdateCancionRequest.php
│   │   └── Resources
│   │       ├── CancionResource.php
│   │       └── UserResource.php
│   └── Models
│       ├── Cancion.php
│       └── User.php
├── bruno
│   └── API Canciones EAGR
├── config
├── database
│   ├── factories
│   ├── migrations
│   └── seeders
├── docs
├── public
├── resources
├── routes
│   └── api.php
├── storage
├── tests
├── .env.example
├── .gitignore
├── artisan
├── composer.json
└── README.md

Base de datos

Base utilizada en producción:

eagr_canciones_api

Tablas principales:

users

canciones

personal_access_tokens

migrations

cache

cache_locks

jobs

job_batches

failed_jobs

sessions

Relación principal

users 1 ─────── N canciones

Cada canción tiene un campo:

user_id

que identifica al usuario propietario.

Instalación local

1. Clonar el repositorio

git clone https://github.com/EdsaiGarrey/EAGRCancionesAPI.git
cd EAGRCancionesAPI

2. Instalar dependencias

composer install

3. Crear el archivo .env

En Windows PowerShell:

Copy-Item .env.example .env

En Linux:

cp .env.example .env

4. Generar la clave

php artisan key:generate

5. Configurar MySQL

Editar .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eagr_canciones_api
DB_USERNAME=TU_USUARIO
DB_PASSWORD=TU_CONTRASEÑA

6. Limpiar la configuración

php artisan optimize:clear

7. Ejecutar migraciones

php artisan migrate

8. Iniciar Laravel

php artisan serve

URL local:

http://127.0.0.1:8000/api

Pruebas con Bruno

La colección se encuentra en:

bruno/API Canciones EAGR

Para utilizarla:

Abrir Bruno.

Seleccionar Open Collection.

Elegir la carpeta bruno/API Canciones EAGR.

Seleccionar el entorno correspondiente.

Ejecutar primero Registro o Login.

Copiar el access_token sin comillas.

Guardarlo temporalmente en la variable token.

Ejecutar las peticiones protegidas.

Variables sugeridas:

baseUrl = http://82.25.93.110:8082/api
token =
cancionId = 1

Orden recomendado de pruebas

Verificar el VPS con GET /api.

Registrar usuario.

Iniciar sesión.

Guardar el token.

Consultar usuario autenticado.

Crear canción.

Listar canciones.

Consultar una canción.

Actualizar la canción.

Ejecutar una validación incorrecta.

Eliminar la canción.

Cerrar sesión.

Comprobar que el token eliminado responde 401.

Seguridad

El repositorio no debe incluir:

Archivo .env.

Contraseñas reales.

Claves privadas.

Tokens reales de Sanctum.

Contraseña del VPS.

Contraseña de MySQL.

Antes de subir la colección de Bruno, la variable debe quedar así:

token =

Documentación

La guía del proyecto puede almacenarse en:

docs/

Estado del proyecto

API REST funcional.

Base de datos MySQL conectada.

Autenticación mediante Laravel Sanctum.

CRUD de canciones completo.

Validaciones activas.

Colección de Bruno configurada.

Proyecto desplegado en VPS con Nginx.
