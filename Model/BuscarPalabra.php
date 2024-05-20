<?php
// require_once '/xampp/htdocs/proyecto-brawlS/Model/ConnDB.php';

function buscar_palabra($palabra)
{
    $db = new ConnDB(); // <-- Instanciamos la clase de conexión a la base de datos
    $db->conectar(); // <-- Usamos el método conectar
// En esta variable guardamos el resultado de la consulta en donde buscamos la palabra
    $consulta_busqueda_palabra = "SELECT id,nombre,descripcion FROM brawlers WHERE MATCH(descripcion) AGAINST ('" . $palabra . "')";
    // Ejecutamos la consulta SQL almacenada en la variable $consulta_busqueda_palabra utilizando el método ejecutarSQL() del objeto $db
    $consulta = $db->ejecutarSQL($consulta_busqueda_palabra);
    $resultado = array('descripcionB' => null, 'idB' => null);
    // Utilizamos un bucle while para iterar sobre cada fila devuelta por la consulta
    while ($fila = $db->siguiente_fila($consulta)) {
        $resultado['idB'] = $fila['id']; // <-- Imprimimos el valor de la columna 'id' de la fila actual
        $resultado['descripcionB'] = $fila['descripcion'];  // <-- Imprimimos el valor de la columna 'descripcion' de la fila actual
    }
    return $resultado;
}