<?php
class Comentario
{
    private $id;
    private $id_personaje;
    private $texto;
    private $mi_connDB;


    public function __construct($id_personaje, $texto)
    {
        $this->id;
        $this->id_personaje = $id_personaje;
        $this->texto = $texto;
        $this->mi_connDB = new ConnDB();
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_id_personaje()
    {
        return $this->id_personaje;
    }

    public function get_texto()
    {
        return $this->texto;
    }

    public function visualizar_comentario()
    {
        $cadena_de_datos = $this->id_personaje . '#' . $this->texto;
        return $cadena_de_datos;
    }

    public function recuperar_comentario($id)
    {
        // Posible mejoras:
        // Usar bindParam;
        try {
            $this->mi_connDB->conectar();
            if ($this->id_personaje > 0) {
                $consulta_sql = "SELECT * FROM comentarios WHERE id='" . $id . "'";
                $consulta = $this->mi_connDB->ejecutarSQL($consulta_sql);
                $fila = $this->mi_connDB->siguiente_fila($consulta);
                $this->id = $fila['id'];
                $this->texto = $fila['texto'];
            } else {
                throw new Exception("No se encontró el comentario con el ID: " . $this->id_personaje);
            }
        } catch (PDOException $e) {
            throw new Exception('No se puedo recuperar el comentario' . $e->getMessage());
        }
    }

    public function insertar_comentario()
    {
        try {
            $this->mi_connDB->conectar();
            $consulta_sql = "INSERT INTO comentarios (id_personaje, texto) VALUES ('" . $this->id_personaje . "', '" . $this->texto . "')";
            $this->mi_connDB->ejecutarSQL($consulta_sql);
            $this->mi_connDB->desconectar();
        } catch (PDOException $e) {
            throw new Exception('No se puedo insertar el comentario' . $e->getMessage());
        }
    }
}
