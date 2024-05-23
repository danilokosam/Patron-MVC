<?php

include_once './header.php';
?>

<form action="index.php" method="post">
    <input type="hidden" name="id_personaje" value="<?php echo $id_personaje ?>">
    <textarea name="comentario" cols="40" rows="10"></textarea>
    <input type="submit">
</form>