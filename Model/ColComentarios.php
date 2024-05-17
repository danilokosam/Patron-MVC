<?php
class ColComentarios
{
    private $mi_conexionDB;
    private $array_comentarios;

    public function __construct($id_personaje)
    {
        $this->mi_conexionDB = new ConnDB();
        $this->mi_conexionDB->conectar();
        $consulta_SQL = "SELECT * FROM comentarios WHERE idP = '$id_personaje'";
        $consulta = $this->mi_conexionDB->ejecutarSQL($consulta_SQL);
        $this->poblar_array_comentarios($consulta);
        $this->mi_conexionDB->desconectar();
    }

    public function ver_todos()
    {
        return $this->array_comentarios;
    }

    public function poblar_array_comentarios($consulta)
    {
        $this->array_comentarios = array();
        while ($fila = $this->mi_conexionDB->siguiente_fila($consulta)) {
            $comentario_actual = new Comentario($fila['idP'], $fila['texto']);
            array_push($this->array_comentarios, $comentario_actual);
        }
    }
}
