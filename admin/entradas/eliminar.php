<?php

include_once("conexion.php");

$identradas = $_GET['identradas'];

mysqli_query($conn, "DELETE FROM entradas WHERE identradas=$identradas ");

header("Location:index.php");
?>