<div class="contenedor-articulos">
    <div>
        <p>Titulo:</p>
        <?php echo $titulo_personaje ?>
    </div>
    <div>
        <p>Texto:</p>
        <?php echo $texto_personaje ?>
    </div>
</div>

<?php
// Comentarios
foreach ($array_comentarios_personaje as $objeto_comentario) {
    echo '<div class="comentarios">';
    echo '<div>' . $objeto_comentario->get_texto() . '</div>';
    echo '</div>';
}
