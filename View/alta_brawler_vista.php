<?php

include_once './header.php';
?>

<form action="/index.php" method="post">
    <fieldset>
        <legend>Nombre del brawler</legend>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo">
    </fieldset>
    <fieldset>
        <legend>Descripcion del brawler</legend>
        <label for="texto">Texto:</label>
        <textarea id="texto" name="texto" cols="40" rows="10"></textarea>
    </fieldset>
    <input type="submit" name="enviar" value="Enviar">
</form>