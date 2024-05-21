Resultado de la búsqueda:
<?php

if ($descripcion == null || $descripcion == '') {
    echo '<div class="contenedor-personajes">';
    echo '<div id="content" class="brawler">La palabra no se encontró 😢</div>';
} else {
    echo '<div id="content" class="descripcion">' . $descripcion . '</div>';
    echo '<script>let palabra="' . $palabra . '"</script>';
}
?>