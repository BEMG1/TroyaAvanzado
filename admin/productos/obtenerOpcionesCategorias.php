<?php
include("./conexion.php");

// Realiza la lógica para obtener opciones desde la base de datos
$sql = "SELECT DISTINCT idcategorias, nombrecategorias FROM categorias";
$result = $conn->query($sql);

$opciones = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $opciones[] = array(
            'idcategorias' => $row['idcategorias'],
            'nombrecategorias' => $row['nombrecategorias']
        );
}
}

// Devuelve las opciones como JSON
echo json_encode($opciones);

$conn->close();
?>