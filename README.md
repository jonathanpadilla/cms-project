# cms project

### instalación

* Crear base de datos en phpmyadmin y agregar a "app/config/parameters.yml" en "database_name: mibasededatos"
* Instalar FOSUserBundle por cmd: composer require friendsofsymfony/user-bundle "~2.0@dev"
* Actualizar entidades por cmd: php bin/console doctrine:schema:update --force
