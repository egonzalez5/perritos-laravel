# INSTALACIÓN APP PERRITOS

Documentación https://laravel.com/docs/8.x

## Instalación

Pasos para instalar las dependencias

1. Compouser https://getcomposer.org/download/
2. Compouser https://getcomposer.org/doc/00-intro.md

## Clonamos el repositorio

```
 $ git clone https://github.com/egonzalez5/perritos-laravel.git
```

## Accedemos al directorio

```
$ cd perritos-laravel
```

## Ejecutamos el siguiente comando.

```
 $ composer install
```

## Modificamos el nombre del archivo **.env.example.** por **.env** y agregamos nuestras credenciales y craemos base de datos.

## Generamos APP_KEY con el siguiente comando.
```
$ php artisan key:generate
```

## Descargamos dependencias de npm.
```
$ npm install
```

## Ejecutamos las migraciones
```
$ php artisan migrate
```

## Listo ya podemos ejecutar nuestra API.

```
 $ php artisan serve
```
