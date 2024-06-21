# Prueba Tecnica: API de contenido


### Endpoints de la API:

- Endpoints de autenticación:
    - `POST /api/register` - Registrar un nuevo usuario.
    - `POST /api/login` - Autentica un usuario y proporciona un token.
- Endpoints de usuario:
    - `GET /api/user` - Obtener los datos del usuario autenticado.
    - `PUT /api/user` - Actualiza el perfil del usuario autenticado.
- Endpoints de contenido:
    - `POST /api/content` - Crear contenido nuevo.
    - `GET /api/content` - Recuperar una lista de contenidos (con opciones de filtrado por título o descripción de contenido que haga match parcial).
    - `GET /api/content/{id}` - Recupera detalles específicos del contenido.
    - `PUT /api/content/{id}` - Actualizar contenido existente.
    - `DELETE /api/content/{id}` - Eliminar contenido.
- Endpoints del marketplace:
    - `POST /api/content/{id}/rate` - Valorar un contenido.
    - `POST /api/content/{id}/favorite` - Marcar como favorito un contenido.
    - `GET /api/content/favorites` - Obtener una lista de los contenidos favoritos del usuario autenticado.

---

### Como iniciar el proyecto.

#### Requerimientos:
    - Docker: https://docs.docker.com/compose/
    - Git: https://git-scm.com/downloads
    - Puerto 8000 disponible
    - Recomendaciones:
      - Usar un Sistema Opertivo unix / linux para ejecutar comandos make
      - Usar Postman e importar el archivo `prueba-tecnica-postman.json` para probar los endpoints.

1. Clonar el proyecto

```
git clone git@github.com:oyepez003/prueba-tecnica-06-2024.git
```

2. Una vez dentro de la carpeta del proyecto, crear la imagen de docker

```
make build
```

o puede usar el comando

```
docker compose build
```

3. Iniciar el contenedor

```
make up
```

o puede usar el comando

```
docker compose up -d
```

4. Ahora puede entrar a http://localhost:8000 y deberia mostrar la pagina de bienvenida de Symfony 7


5. Si desea entrar a la linea de comandos del proyecto puede ejcutar el comando:

```
make bash
```

o puede usar el comando

```
docker compose exec app bash
```

6. Finalmente puede bajar el contenedor ejecutando:

```
make down
```

o puede usar el comando

```
docker compose down --remove-orphans
```

7. En el repositorio encontrara el archivo `prueba-tecnica-postman.json` que puede importar en postman y probar los endpoints directamente en herramienta.

---

Puntos a tomar en cuenta:

- Recuerde que el primer endpoint que debe usar es `api/register` para crear un usuario
- Una vez creado el usuario debe usar el endpoint `api/login` con el usuario y password creado en el paso anterior par aobtener el token
- Si usa el el archivo de Postman puede usar las variables `WIDITRADE_API_TOKEN` para guardar el token generado por el endpoint de autenticacion y la variable `WIDITRADE_API_BASE_URL` si cambiar la url de la aplicacion, por defecto su valor es `http://localhost:8000`


`Cualquier problema al ejecutar el proyecto pueden contactarme por correo o dejar un comentario en el repositorio.`


### TODO:

* Por motivos de tiempo
  * No fue implementado subida de archivos
  * No se agregaron tests
  * Falta documentar los endpoints con Swagger, aunque si se provee en el repositorio un export de Postman listo para usar y probar los endpoints.