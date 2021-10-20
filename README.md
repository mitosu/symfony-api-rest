# symfony-api-platform-test
API Test

API REST con Symfony 5 y API Platform
- Modelo de Vivienda
- Serialization
- API Rest
- API Platform
- Docker
- Make
- RabbitMQ (No se utiliza, pero existe un contenedor - optional).

Ejecutar Proyecto
/ Requerimientos:
- Docker. Es necesario instalar docker.
- Docker compose. Es necesario instalar docker-compose.
- Make. Es necesario instalar make

1.- Teniendo lo anterior, nos situamos en el directorio api y ejecutamos:
```
make run
```
Esto descargara las imagenes y creará los contenedores del proyecto.

2.-Lo siguiente es instalar las dependencias del proyecto, esto lo haremos con el siguiente comando:
```
make prepare
```

3.- Ahora ejecutamos las migraciones para crear las tablas necesarias:
```
make migrations
```
Endpoints:
La documentación a los mismos se encuentra en:
http://localhost:250/api/v1/docs.json

A continuación capturas de sus respuestas en Postman:

Lista completa de viviendas:
- http://localhost:250/api/v1/living_places
![](../../Desktop/Screenshot 2021-10-20 at 14.26.30.png)

Una vivienda:
- http://localhost:250/api/v1/living_places/ff9859c5-d6e0-4fab-8908-c27669678a92
![](../../Desktop/Screenshot 2021-10-20 at 14.29.45.png)

Registro de una vivienda (devuelve el recurso creado):
![](../../Desktop/Screenshot 2021-10-20 at 14.31.31.png)

author: miguelangel.torres@outlook.com






