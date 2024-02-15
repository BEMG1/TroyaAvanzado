<?php

include_once("conexion.php");

$idsalidas = $_GET['idsalidas'];

mysqli_query($conn, "DELETE FROM salidas WHERE idsalidas=$idsalidas ");

header("Location:index.php");
?>