<?php

// Configuración de la base de datos
$mysqli = '';
$usuario = 'root';
$clave = '';
$server = 'localhost';
$db = 'troya';

// Otras configuraciones comunes
//$baseURL = "http://localhost/tu_app"; // Cambia esto según la URL de tu aplicación

// Conexión a la base de datos (puedes extender esto según tus necesidades)
$conn = new mysqli("localhost","root","","troya");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

?>
