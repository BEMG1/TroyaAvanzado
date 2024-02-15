<?php

include_once("conexion.php");

$Nid = $_GET['numeroventas'];

mysqli_query($conn, "DELETE FROM ventas WHERE numeroventas=$Nid");

header("location:index.php");
?>