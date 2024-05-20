<?php

$col_personajes = new ColPersonajes();
$personaje_array = $col_personajes->ver_todos();

include_once './View/visualizar_personajes.php';
