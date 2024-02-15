<?php
include("./conexion.php");

// Realiza la lógica para obtener opciones desde la base de datos
$sql = "SELECT DISTINCT documentoCliente FROM cliente";
$result = $conn->query($sql);

$opciones = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $opciones[] = $row['documentoCliente'];
            
    
    }
}

// Devuelve las opciones como JSON
echo json_encode($opciones);

$conn->close();
?>