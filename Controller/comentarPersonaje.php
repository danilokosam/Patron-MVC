<?php

function mostrar_formulario($id)
{
    $id_personaje = $id;
    include_once './View/comentar.php';
}

function grabar_formulario(){
    $id_personaje = $_POST['id_personaje'];
    $comentario = $_POST['comentario'];
    $nuevo_comentario = new Comentario($id_personaje,$comentario);
    $nuevo_comentario->insertar_comentario();
}
