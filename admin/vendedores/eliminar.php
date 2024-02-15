<?php

include_once("conexion.php");

$id = $_GET['idvendedores'];
mysqli_query($cone, "DELETE FROM vendedores WHERE idvendedores=$id");

header("Location:index.php");
?>