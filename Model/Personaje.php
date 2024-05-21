<?php
// Definición de la clase Personaje
class Personaje
{
    // Propiedades privadas de la clase
    private $personaje_id;
    private $personaje_nombre;
    private $personaje_descripcion;
    private $mi_conexion_db;

    // Constructor de la clase
    public function __construct($personaje_id, $personaje_nombre, $personaje_descripcion)
    {
        // Asignación de valores a las propiedades
        $this->personaje_id = $personaje_id;
        $this->personaje_nombre = $personaje_nombre;
        $this->personaje_descripcion = $personaje_descripcion;
        // Creación de un nuevo objeto ConnDB
        $this->mi_conexion_db = ConnDB::obtenerInstancia();
    }

    // Métodos para obtener los valores de las propiedades
    public function get_id()
    {
        return $this->personaje_id;
    }

    public function get_personaje_nombre()
    {
        return $this->personaje_nombre;
    }

    public function get_personaje_descripcion()
    {
        return $this->personaje_descripcion;
    }

    // Método para visualizar la información del personaje
    public function visualizar_personaje()
    {
        $array_personajes = $this->personaje_id . '#' . $this->personaje_nombre . '#' . $this->personaje_descripcion;
        return $array_personajes;
    }

    // Método para recuperar un personaje de la base de datos
    public function recuperar_personaje($id)
    {
        // Conexión a la base de datos
        $this->mi_conexion_db->conectar();
        // Consulta SQL para seleccionar un personaje por su ID
        $consulta_SQL = "SELECT * FROM brawlers WHERE id= :id";
        // Parámetros para la consulta SQL
        $parametros = ['id' => $id];
        // Ejecución de la consulta SQL
        $consulta = $this->mi_conexion_db->ejecutarSQL($consulta_SQL, $parametros);
        // Obtención de la fila resultante
        $fila = $this->mi_conexion_db->siguiente_fila($consulta);
        // Asignación de los valores a las propiedades del objeto
        $this->personaje_id = $fila['id'];
        $this->personaje_nombre = $fila['nombre'];
        $this->personaje_descripcion = $fila['descripcion'];
    }

    // Método para insertar un nuevo personaje en la base de datos
    public function insertar_personaje()
    {
        // Conexión a la base de datos
        $this->mi_conexion_db->conectar();
        // Consulta SQL para insertar un nuevo personaje
        $consulta_SQL = "INSERT INTO brawlers (nombre,descripcion) VALUES (:nombre, :descripcion)";
        // Parámetros para la consulta SQL
        $parametros = [':nombre' => $this->personaje_nombre, ':descripcion' => $this->personaje_descripcion];
        // Ejecución de la consulta SQL
        $this->mi_conexion_db->ejecutarSQL($consulta_SQL, $parametros);
        // Desconexión de la base de datos
        $this->mi_conexion_db->desconectar();
    }

    // Método para eliminar un personaje de la base de datos
    public function eliminar_personaje()
    {
        // Conexión a la base de datos
        $this->mi_conexion_db->conectar();
        // Consulta SQL para eliminar un personaje por su ID
        $consulta_SQL = "DELETE FROM brawlers WHERE id= :id";
        // Parámetros para la consulta SQL
        $parametros = [":id" => $this->personaje_id];
        // Ejecución de la consulta SQL
        $this->mi_conexion_db->ejecutarSQL($consulta_SQL, $parametros);
        // Desconexión de la base de datos
        $this->mi_conexion_db->desconectar();
    }
}
