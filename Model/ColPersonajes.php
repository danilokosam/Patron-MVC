<?php
class ColPersonajes // <-- Colección Personajes
{
    private $mi_conexion_db; // <-- Se utiliza para manejar la conexión a la base de datos
    private $array_personajes; // <-- Se utiliza para almacenar los personojaes obtenidos de la base de datos

    public function __construct()
    {
        $this->mi_conexion_db = ConnDB::obtenerInstancia(); // <-- Creamos la instancia
        $this->mi_conexion_db->conectar(); // <-- Nos conectamos
        try {
            $consulta_SQL = 'SELECT * FROM brawlers'; // <-- Hacemos la consulta para obtener todo de la tabla
            $consulta = $this->mi_conexion_db->ejecutarSQL($consulta_SQL); // <-- Ejecutamos la consulta
            $this->poblar_arrays_personajes($consulta); // <-- Poblamos el array con el método
        } catch (Exception $e) {
            throw new Exception('Error al ejecutar la consulta' . $e->getMessage());
        }
    }

    // Este método devuelve el array de personajes. Permite a otras partes del programa acceder a la lista completa de personajes
    public function ver_todos()
    {
        return $this->array_personajes;
    }

    /* 
    Este método privado toma como parámetro el resultado de una consulta SQL. Utiliza un bucle while para 
    iterar sobre cada fila del resultado de la consulta y crea una nueva instancia de Personaje con los datos
    de cada fila. Luego, añade cada nuevo personaje al array $array_personajes
    */
    private function poblar_arrays_personajes($consulta)
    {
        $this->array_personajes = [];
        while ($fila = $this->mi_conexion_db->siguiente_fila($consulta)) {
            $personaje_actual = new Personaje($fila['id'], $fila['nombre'], $fila['descripcion']);
            array_push($this->array_personajes, $personaje_actual);
        }
    }
}