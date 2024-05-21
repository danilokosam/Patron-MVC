<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./View/css/styles.css">
    <title>Brawler Dani</title>
</head>

<body>
    <div class="container">
        <div class="space space-1"></div>
        <div class="space space-2"></div>
        <div class="space space-3"></div>
        <h1>Brawlers</h1>
        <div class="contenedor-personajes">
            <nav>
                <ul>
                    <li><a class="nuevo-articulo" href="index.php?grabarper=">Nuevo Brawler</a></li>
                    <li>
                        <form class="busqueda" action="index.php" method="post">
                            <input type="text" name="palabrabuscar" placeholder="Buscar...">
                            <input type="submit" value="🔍">
                        </form>
                    </li>
                </ul>
            </nav>
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