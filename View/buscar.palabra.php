Resultado de la búsqueda:
<?php

if ($descripcion == null) {
    echo '<div id="content" class="brawler">La palabra no se encontró 😢</div>';
} else {
    echo '<div id="content" class="brawler">' . $descripcion . '</div>';
    echo '<script>let palabra="' . $palabraBuscar . '"</script>';
}


?>

<script type="text/javascript" src="/View/scripts/codigo.js"></script>