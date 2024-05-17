<?php

$personaje_seleccionado = new Personaje(null, null, null);
$personaje_seleccionado->recuperar_personaje($id_personaje);
$cadena_resultado = $personaje_seleccionado->visualizar_personaje();
$array_contenido_personaje = explode('#', $cadena_resultado);

$id_personaje = $array_contenido_personaje[0];
$titulo_personaje = $array_contenido_personaje[1];
$texto_personaje = $array_contenido_personaje[2];

$coleccion_comentarios = new ColComentarios($id_personaje);
$array_comentarios_personaje = $coleccion_comentarios->ver_todos();

include_once './Patron-MVC/View/personaje_y_comentarios.php';
