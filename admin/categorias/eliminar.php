<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="stylesheet" href="../../css/eliminar1_3.css">
</head>
<body>

<?php

include_once("conexion.php");

$idcategorias = $_GET['idcategorias'];

$resultado_verificacion = mysqli_query($conn, "SELECT * FROM producto WHERE idcategoria=$idcategorias");
$resultadoNombre = mysqli_query($conn, "SELECT nombrecategorias FROM categorias WHERE idcategorias=$idcategorias");

if (mysqli_num_rows($resultado_verificacion) > 0) {
    $nombrecategoria = mysqli_fetch_assoc($resultadoNombre);
    $nombre = isset($nombrecategoria['nombrecategorias']) ? $nombrecategoria['nombrecategorias'] : "nombre no disponible";

    session_start();
    $_SESSION['mensaje'] = "No se puede eliminar la categoria '$nombre' por llaves foraneas";
} else {

    $resultado_eliminacion = mysqli_query($conn, "DELETE FROM categorias WHERE idcategorias=$idcategorias");

    if ($resultado_eliminacion) {
        session_start();
        $_SESSION['mensaje'] = "categoria eliminada correctamente";
    } else {

         session_start();
         $_SESSION['mensaje'] = "Error al eliminar la categoria: " . mysqli_error($cone);
     }
 }

 // Obtener el mensaje de la sesión (después de definirlo)
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "Error en mensaje";
unset($_SESSION['mensaje']); // Limpiar el mensaje para la próxima vez
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
    
    window.location.href = './index.php';
    });
</script>
</body>
</html>
