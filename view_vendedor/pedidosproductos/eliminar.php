<?php

include_once("conexion.php");

$productos = $_GET['idpedidos'];

mysqli_query($conn, "DELETE FROM pedidosproductos WHERE idpedidos=$productos");

header("Location:index.php");

?>