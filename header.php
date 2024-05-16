<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brawler Dani</title>
</head>

<body>
    <h1>Ejercicio OPP y MVC</h1>
    <div class="contenedor-personajes">

        <?php
        spl_autoload_register(function ($class) {
            $baseDir = __DIR__ . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR;
            $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
            if (file_exists($file)) {
                require $file;
            }
        });


        ?>