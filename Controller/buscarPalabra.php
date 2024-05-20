<?php
function buscar($palabra)
{
    include_once './Model/BuscarPalabra.php';
    $resultado = buscar_palabra($palabra);

    mostrar_resultado_busqueda($resultado['descripcionB'], $palabra, $resultado['idB']);
    // include_once './Patron-MVC/View/buscar.palabra.php';
}

function mostrar_resultado_busqueda($descripcion, $palabra, $id_personaje)
{
    include_once './View/buscar.palabra.php';
}