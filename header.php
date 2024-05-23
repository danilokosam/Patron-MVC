<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./View/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Brawler Dani</title>
</head>

<body>
    <div class="container">
        <div class="space space-1"></div>
        <div class="space space-2"></div>
        <div class="space space-3"></div>
        <h1 id="app">Brawlers</h1>
        <nav>
            <ul>
                <li><a class="nuevo-articulo" href="index.php?grabarper=">Nuevo Brawler</a></li>
                <li> <a id="enlace-principal" href="index.php">Inicio</a></li>
                <li>
                    <form class="busqueda" action="index.php" method="post">
                        <input type="text" name="palabrabuscar" placeholder="Buscar palabra">
                        <input type="submit" value="🔍">
                    </form>
                </li>
            </ul>
        </nav>
        <div class="contenedor-personajes">
            <?php
            spl_autoload_register(function ($class) {
                $baseDir = __DIR__ . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR;
                $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
                if (file_exists($file)) {
                    require $file;
                } else {
                    // Lanza una excepción si el archivo de la clase no se encuentra
                    throw new Exception("No se pudo cargar la clase: $class");
                }
            });
            ?>