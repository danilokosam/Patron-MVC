<?php

$db = new ConnDB();
$db->conectar();
$consulta_busqueda_palabra = "SELECT id,ATitulo,ATexto FROM brawlers WHERE MATCH(ATexto) AGAINST ('" . $palabra . "')";
$consulta = $db->ejecutarSQL($consulta_busqueda);

while ($fila = $db->siguiente_fila($consulta_busqueda)) {
    echo $fila['id'];
    echo $fila['ATexto'];
}
