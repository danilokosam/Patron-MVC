<?php

include './header.php';

if (isset($_GET['grabarper'])) {
    include_once 'Controller/grabarPersonajes.php';
    mostrar_formulario();
} elseif (isset($_POST['nombre'])) {
    include_once 'Controller/grabarPersonajes.php';
    grabar_datos();
} /* elseif (isset($_POST['palabrabuscar'])) {
  $palabrabuscar = $_POST['palabrabuscar'];
  if ($palabrabuscar != "") {
      include_once 'Controller/buscar_palabra.php';
      buscar($palabrabuscar);
  }
}
*/ else {
    include_once './Controller/verTodosPersonajes.php';
}

include './footer.php';