<form action="./index.php" method="post">
    <fieldset>
        <legend>Texto a buscar:</legend>
        <label for="palabrabuscar"></label>
        <input type="text" name="palabrabuscar">
    </fieldset>
    <input type="submit">
</form>

<?php

// var_dump($array_personajes);


foreach ($personaje_array as $objeto_personaje) {
    echo '<div class="brawler"></div>';
    $contenido_personaje = $objeto_personaje->visualizar_personaje();
    $personaje_array_datos = explode('#', $contenido_personaje);
    echo '<div>ID: ' . $personaje_array_datos[0] . '</div>';
    echo '<div>Nombre: ' . $personaje_array_datos[1] . '</div>';
    echo '<div>Descripción: ' . $personaje_array_datos[2] . '</div>';

    //     // FALTA IMPLEMENTAR: REALIZAR COMENTARIO
}
