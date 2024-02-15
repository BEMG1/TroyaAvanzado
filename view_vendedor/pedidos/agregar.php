<?php

include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se ha enviado el formulario, procesar la información
    $pedido = $_POST['txtpedido'];
    $documento = $_POST['txtdocumento'];
    $valor = $_POST['txtvalor'];

    // Insertar en la base de datos
    mysqli_query($conn, "INSERT INTO pedidos(idpedidos, documentoCliente, fechapedidos, horapedidos, valorpedido) VALUES('$pedido','$documento',CURRENT_DATE,CURRENT_TIME,'$valor')");

    // Redireccionar a la página de índice después del registro exitoso
    header("Location: ../../../TroyaNW/ViewVendedor/pedidos/index.php");
    exit();
}
?>
<html>
<head>
    <title>Pedidos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
<div class="caja_popup2" id= "formregistrar">
<form class="contenedor_popup" method="post" action="agregar.php">
<table>
  <tr><th colspan="2">Nuevo Pedido</th></tr>	

<tr>
<td>Id Pedido</td>
<td><input type="number" name="txtpedido" require></td>
</tr>
<tr>
<td>Documento cliente</td>
<td><input type="number" name="txtdocumento" require></td>
</tr>
<tr>
<tr>
<td>Valor Pedido</td>
<td><input type="number" name="txtvalor" require></td>
</tr>
<tr>
<td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a este pedido?');">
                    </td>
</tr>

</table>
</form>
</div>
<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../pedidos/index.php');
            // Redirigir a la nueva página
            window.location.replace('../pedidos/index.php');
        }
    </script>
</body>
</html>