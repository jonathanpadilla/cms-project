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
