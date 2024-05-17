<?php

include './header.php';

if (isset($_GET['grabarper'])) {
    include_once './Controller/grabarPersonajes.php';
    mostrar_formulario();
} elseif (isset($_POST['nombre'])) {
    include_once './Controller/grabarPersonajes.php';
    grabar_datos();
} elseif (isset($_POST['palabrabuscar'])) {
    $palabrabuscar = $_POST['palabrabuscar'];
    if ($palabrabuscar != "") {
        include_once './Controller/buscarPalabra.php';
        buscar($palabrabuscar);
    }
} elseif (isset($_GET['vercoment'])) {
    $id_personaje = $_GET['vercoment'];
    include_once './Controller/verComentarios.php';
} elseif (isset($_GET['comentar'])) {
    $id_personaje = $_GET['comentar'];
    include_once './Controller/comentarPersonaje.php';
    mostrar_formulario($id_personaje);
} elseif (isset($_GET['comentario'])) {
    include_once './Controller/comentarPersonaje.php';
    grabar_formulario();
} else {
    include_once './Controller/verTodosPersonajes.php';
}

include './footer.php';
