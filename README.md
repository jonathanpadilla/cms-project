# cms project

### instalación

* Crear base de datos en phpmyadmin y agregar a "app/config/parameters.yml"
```
database_name: mibasededatos
```
* Instalar FOSUserBundle
```
$ composer require friendsofsymfony/user-bundle "~2.0@dev"
```
* Actualizar entidades
```
$ php bin/console doctrine:schema:update --force
```
* Crear usuario, luego asignar perfil admin
```
$ php bin/console fos:user:create nombredeusuario correo@ejemplo.com miclave123
$ php bin/console fos:user:promote nombredeusuario ROLE_ADMIN