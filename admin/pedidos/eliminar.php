<?php

include_once("conexion.php");

$pedidos = $_GET['idpedidos'];

mysqli_query($conn, "DELETE FROM pedidos WHERE idpedidos=$pedidos");

header("Location:index.php");

?>