<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="stylesheet" href="../../css/eliminar1_3.css">
  <style>
   
</style>
</head>
<body>

<?php

include_once("conexion.php");

$documento = $_GET['documentoProveedor'];

// Verificar si hay registros relacionados en la tabla 'vendedores'
$resultado_verificacion = mysqli_query($cone, "SELECT * FROM vendedores WHERE documentovendedores=$documento");
$resultadoNombre = mysqli_query($cone, "SELECT nombreProveedor FROM proveedor WHERE documentoProveedor=$documento");

if (mysqli_num_rows($resultado_verificacion) > 0) {
    $nombreproveedor = mysqli_fetch_assoc($resultadoNombre);
    $nombre = $nombreproveedor['nombreProveedor'];
    
    // Establecer mensaje en la sesión
    session_start();
    $_SESSION['mensaje'] = "No se puede eliminar el proveedor $nombre por llaves foraneas";
} else {
    // Eliminar el proveedor
    $resultado_eliminacion = mysqli_query($cone, "DELETE FROM proveedor WHERE documentoProveedor=$documento");

    if ($resultado_eliminacion) {
        // Establecer mensaje en la sesión
        session_start();
        $_SESSION['mensaje'] = "Proveedor eliminado correctamente";
    } else {
        // Establecer mensaje de error en la sesión
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el proveedor: " . mysqli_error($cone);
    }
}

// Obtener el mensaje de la sesión (después de definirlo)
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
unset($_SESSION['mensaje']); // Limpiar el mensaje para la próxima vez
?>

<!-- Mostrar el mensaje -->
<div id="mensaje-container" class="mensaje-container">
    <p id="mensaje-text"><?php echo $mensaje; ?></p>
    <button id="boton-ok" class="boton-ok">OK</button>
</div>

<script>
    const mensajeContainer = document.getElementById("mensaje-container");
    const mensajeText = document.getElementById("mensaje-text");
    const botonOK = document.getElementById("boton-ok");

    if (mensajeText.textContent !== "") {
        mensajeContainer.style.display = "block";
    }

    botonOK.addEventListener("click", function() {
    
    window.location.href = './index.php';
    });
</script>
</body>
</html>
