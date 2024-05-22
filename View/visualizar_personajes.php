<?php

// var_dump($array_personajes);


foreach ($personaje_array as $objeto_personaje) {
    echo '<div class="brawler">';
    $contenido_personaje = $objeto_personaje->visualizar_personaje();
    $personaje_array_datos = explode('#', $contenido_personaje);
    $id = $personaje_array_datos[0];    
    echo '<div>Nombre: ' . $personaje_array_datos[1] . '</div>';
    echo '<div>Descripción: ' . $personaje_array_datos[2] . '</div>';
    echo '<div class="comentarios"><a href="index.php?vercoment=' . $id . '">Ver comentarios</a><a href="index.php?comentar=' . $id . '">Realizar comentario</a></div>';
    echo '</div>';
}
