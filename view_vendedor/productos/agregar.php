<?php

include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se ha enviado el formulario, procesar la información
    $producto = $_POST['txtproducto'];
    $nombre = $_POST['txtnombre'];
    $categoria = $_POST['txtcategoria'];
    $salida = $_POST['txtsalida'];
    $entrada = $_POST['txtentrada'];
    $stock = $_POST['txtstock'];
    $valor = $_POST['txtvalor'];
    $iva = 0.19;
    $documento = $_POST['txtdocumento'];

    // Insertar en la base de datos
    mysqli_query($conn, "INSERT INTO producto (idproducto, nombreproducto, idcategoria, salidaproducto, entradaproducto, stockproducto, valorproducto, IVAproducto, documentoproveedor) VALUES('$producto','$nombre','$categoria','$salida','$entrada','$stock','$valor','$iva','$documento')");

    // Redireccionar a la página de índice después del registro exitoso
    header("Location: ../../../TroyaNW/ViewVendedor/productos/index.php");
    exit();
}
?>
<html>
<head>
    <title>Prodcutos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
    <div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
            <table>
  <tr><th colspan="2">Nuevo Producto</th></tr>	

<tr>
<td>Id Producto</td>
<td><input type="number" name="txtproducto" require></td>
</tr>
<tr>
<td>Nombre producto</td>
<td><input type="text" name="txtnombre" require></td>
</tr>
<tr>
<td>Id categoria</td>
<td><input type="number" name="txtcategoria" require></td>
</tr>
<tr>
<td>Valor</td>
<td><input type="number" name="txtvalor" require></td>
</tr>
<tr>
<td>Documento proveedor</td>
<td><input type="number" name="txtdocumento" require></td>
</tr>
<tr>
<td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a este producto?');">
                    </td>
</tr>

</table>
</form>
</div>
<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../prodcutos/index.php');
            // Redirigir a la nueva página
            window.location.replace('../productos/index.php');
        }
    </script>
</body>
</html>
