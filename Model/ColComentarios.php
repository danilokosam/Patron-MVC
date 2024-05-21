<?php
/* En esta clase recolectamos toda la colección de los comentarios
 */
class ColComentarios
{
    private $mi_conexionDB; // <-- Propiedad para la conexión a la base de datos
    private $array_comentarios = array(); // <-- Almacena los comentarios en un array

    public function __construct($id_personaje) // <-- Recibimos el id del personaje a recuperar
    {
        $this->mi_conexionDB = ConnDB::obtenerInstancia(); // <-- // Crea una nueva conexión a la base de datos
        $this->mi_conexionDB->conectar(); // <-- Establece la conexión con la base de datos
        // Aqui hacemos la consulta donde el idP es el id del personaje donde queremos recuperar los comentarios
        $consulta_SQL = "SELECT * FROM comentarios WHERE idP = '$id_personaje'";
        $consulta = $this->mi_conexionDB->ejecutarSQL($consulta_SQL); // <-- Usamos el método para realizar la consulta
        $this->poblar_array_comentarios($consulta); // <-- Usamos el método y pasamos el resultado de la consulta
        $this->mi_conexionDB->desconectar(); // <-- Nos desconectamos
    }

    public function ver_todos() // <-- Este método devuelve el array completo de comentarios
    {
        return $this->array_comentarios;
    }

    public function poblar_array_comentarios($consulta) // Rellena el array de comentarios con los datos obtenidos de la consulta
    {
        // Utilizamos un bucle while para iterar sobre cada fila devuelta por la consulta
        while ($fila = $this->mi_conexionDB->siguiente_fila($consulta)) {
            // Crea un nuevo objeto Comentario con el ID y el texto de cada comentario
            $comentario_actual = new Comentario($fila['idP'], $fila['texto']);
            // Añade el comentario actual al array de comentarios
            array_push($this->array_comentarios, $comentario_actual);
        }
    }
}
