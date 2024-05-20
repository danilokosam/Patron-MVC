<?php
/* 
 Esta clase establece una conexión con la base de datos utilizando PDO
*/
class ConnDB
{
    // Propiedades privadas para la configuración de la conexión a la base de datos
    private $host = 'localhost'; // <-- El host de la base de datos
    private $usuario = 'root'; // <-- EL nombre del usuario para la conexión
    private $contrasena = ''; // <-- La contraseña para la conexión
    private $db_nombre = 'brawlers'; // <-- El nombre de la base de datos
    private $conn; // <-- Variable para almacenar la conexión a la base de datos

    public function __construct()
    {

    }

    // Método para establecer la conexión con la base de datos
    public function conectar()
    {
        try {
            // Intenta crear una nueva conexión PDO
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_nombre . ';charset=utf8mb4', $this->usuario, $this->contrasena);
            // Configura PDO para lanzar excepciones en caso de error
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Captura la excepción y obtén detalles del error
            $error_code = $e->getCode();
            $error_msg = $e->getMessage();
            $error_file = $e->getFile();
            $error_line = $e->getLine();

            //Construye un mensaje de error detallado
            $error_detallado = "Error: {$error_msg}\nCódigo de Error:{$error_code}\nArchivo:{$error_file}\nLínea:{$error_line}";

            // Si hay un error, escribe el mensaje en un archivo de texto y lanza una exepción
            file_put_contents('PDOError.txt', $error_detallado, FILE_APPEND);

            // Lanza una nueva excepción si es necesario o maneja el error
            throw new Exception('Conexión fallida 😢: ' . $e->getMessage());
        }
    }

    // Método para cerrar la conexión con la base de datos
    public function desconectar()
    {
        // Establece la conexión a null, cerrándola efectivamente
        $this->conn = null;
    }

    // Método para ejecutar una consulta SQL
    public function ejecutarSQL($cadena_consulta, $parametros = [])
    {
        try {
            // Prepara la consulta SQL
            $consulta = $this->conn->prepare($cadena_consulta);

            // Ejecuta la consulta con los párametros proporcionados
            $consulta->execute($parametros);

            // Devuelve el resultado de la consulta
            return $consulta;
        } catch (PDOException $e) {
            // Manejo de errores
            throw new Exception('Error al ejecutar la consulta ' . $e->getMessage());
        }
    }

    // Método para obtener la siguiente fila de un conjunto de resultados
    public function siguiente_fila($datos)
    {
        // Obtiene la siguiente fila como un array asociativo
        $fila_superior = $datos->fetch(PDO::FETCH_ASSOC);
        return $fila_superior;
    }
}
