<?php
function eliminar_personaje($id_personaje_eliminar)
{
    $mi_personaje = new Personaje($id_personaje_eliminar, null, null);
    $mi_personaje->eliminar_personaje();
}