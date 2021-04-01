# INSTALACIÓN APP PERRITOS

Documentación https://laravel.com/docs/8.x


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

## Modificamos el nombre del archivo **.env.example.** por **.env** y agregamos nuestras credenciales.

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

## Eecutar nuestra APP.

```
 $ php artisan serve
```
