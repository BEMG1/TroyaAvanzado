<?php
include_once("conexion.php");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se ha enviado el formulario, procesar la información
    $nombredecategorias = $_POST['txtnombre_c'];
    
    $result = mysqli_query($conn, "INSERT INTO categorias (nombrecategorias) VALUES ('$nombredecategorias')");
    
    if ($result) {
        // Redireccionar a la página de índice después del registro exitoso
        header("Location: ./index.php");
        exit();
    } else {
        // Mostrar un mensaje de error o redirigir a una página de error
        echo "Error al registrar la categoría: " . mysqli_error($conn);
    }
    
}
?>

<html>
<head>
    <title>Agregar</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
    <div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
           <div class="table-container">
            <table>
                <tr><th colspan="2"><h1> Nueva categoria </h1></th></tr>
                <tr>
                    <td>Nombre de categoria</td>
                    <td><input type="text" name="txtnombre_c" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">Cancelar</button>
                        <input type="submit" name="btnregistrar" value="Registrar" onClick="return confirm('¿desea registar a esta categoria?');">
                    </td>
                </tr>
            </table>
            </div>
        </form>
    </div>
    <script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../categorias/index.php');
            // Redirigir a la nueva página
            window.location.replace('../categorias/index.php');
        }
        
    </script>
</body>
</html>



   