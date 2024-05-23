<?php

include './header.php';
include './Model/ConnDB.php';

// PAGINACIÓN
$conexion = ConnDB::obtenerInstancia();
$conexion->conectar();
$consulta_sql = "SELECT * FROM brawlers";
$cosultata_re = $conexion->ejecutarSQL($consulta_sql);
$total_de_registros = $cosultata_re->rowCount();
$fila = false;


if ($total_de_registros > 0) {
    $num_registros_por_pagina = 6;
    $primera_vez = false;

    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    }
    if (!$pagina) {
        $inicio = 0;
        $pagina = 1;
    } else {
        $inicio = $pagina - 1;
    }


    $num_total_paginas = ceil($total_de_registros / $num_registros_por_pagina);
    $nueva_consulta_sql = "SELECT * FROM brawlers LIMIT " . $inicio . "," . $num_registros_por_pagina;
    $consulta_sql = $conexion->ejecutarSQL($nueva_consulta_sql);

    
}



// -----------------------------------------------

if (isset($_GET['grabarper'])) {
    include_once './Controller/grabarPersonajes.php';
    mostrar_formulario();
} elseif (isset($_POST['nombre'])) {
    include_once './Controller/grabarPersonajes.php';
    grabar_datos();
} elseif (isset($_POST['palabrabuscar'])) {
    $palabraBuscar = $_POST['palabrabuscar'];
    if ($palabraBuscar != "") {
        include_once './Controller/buscarPalabra.php';
        buscar($palabraBuscar);
    }
} elseif (isset($_GET['vercoment'])) {
    $id_personaje = $_GET['vercoment'];
    include_once './Controller/verComentarios.php';
} elseif (isset($_GET['comentar'])) {
    $id_personaje = $_GET['comentar'];
    include_once './Controller/comentarPersonaje.php';
    mostrar_formulario($id_personaje);
} elseif (isset($_POST['comentario'])) {
    include_once './Controller/comentarPersonaje.php';
    grabar_formulario();
} else {
    include_once './Controller/verTodosPersonajes.php';
}

include './footer.php';
