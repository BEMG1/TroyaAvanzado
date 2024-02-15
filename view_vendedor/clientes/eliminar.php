<?php

include_once("conexion.php");

$codigo = $_GET['documentoCliente'];

mysqli_query($conn, "DELETE FROM cliente WHERE documentoCliente=$codigo");

header("location:index.php");
?>