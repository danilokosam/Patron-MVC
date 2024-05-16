<?php
function mostrar_formulario()
{
    // INCLUIR VISTA
}

function grabar_datos()
{
    $p_nombre = $_POST['nombre'];
    $p_descripcion = $_POST['descripcion'];
    $nuevo_personaje = new Personaje(null, $p_nombre, $p_descripcion);
    $nuevo_personaje->insertar_personaje();
    echo "Personaje grabado correctamente😀 !, <a href='index.php'>Ver todos</a>";
}