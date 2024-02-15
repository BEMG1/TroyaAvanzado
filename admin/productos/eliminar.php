<?php

include_once("conexion.php");

$producto = $_GET['idproducto'];

mysqli_query($conn, "DELETE FROM producto WHERE idproducto=$producto");

header("Location:index.php");

?>