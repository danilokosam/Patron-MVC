<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./View/css/styles.css">
    <title>Brawler Dani</title>
</head>

<body>
    <h1>Brawlers</h1>
    <div class="contenedor-personajes">
        <nav>
            <ul>
                <li><a class="nuevo-articulo" href="index.php?grabarper=">Nuevo Brawler</a></li>
                <li>
                    <form class="busqueda" action="index.php" method="post">
                        Buscar 🔍 <input type="text" name="palabrabuscar">
                        <input type="submit">
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