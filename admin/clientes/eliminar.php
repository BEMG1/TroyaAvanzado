<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="stylesheet" href="../../css/eliminar1_3.css">
</head>
<body>
<?php

include_once("conexion.php");

$codigo = $_GET['documentoCliente'];

$resultado_verificacion = mysqli_query($conn, "SELECT * FROM pedidos WHERE documentoCliente=$codigo");
$resultadoNombre = mysqli_query($conn, "SELECT documentoCliente FROM cliente WHERE documentoCliente = $codigo");

if (mysqli_num_rows($resultado_verificacion) > 0 ) {
    $nombrecategoria = mysqli_fetch_assoc($resultadoNombre);
    $nombre = isset($nombrecategoria['documentoCliente']) ?$nombrecategoria ['documentoCliente'] : "nombre no disponible";

    session_start();
    $_SESSION['mensaje'] = "No se puede eliminar el cliente '$nombre' por llaves foranea";
} else {

    $resultadoEliminacion = mysqli_query($conn, "DELETE FROM cliente WHERE documentoCliente = $codigo ");

    if ($resultadoEliminacion) 
    {
        session_start();
        $_SESSION['mensaje'] = "Cliente eliminado correctamente";
    } else {

        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el cliente: " . mysqli_error($cone);
    }
}


$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "Error en mensaje"; 
unset($_SESSION['mensaje']);
?>

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
        window.location.href = './Index.php';
    });
</script>
</body>
</html>