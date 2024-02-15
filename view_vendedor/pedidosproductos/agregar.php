<?php

include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se ha enviado el formulario, procesar la información
    $pedido = $_POST['txtpedido'];
    $producto = $_POST['txtproducto'];
    $cantidad = $_POST['txtcantidad'];
    $unidad = $_POST['txtunidad'];
    $subtotal = $unidad * $cantidad;
    $descuento = $_POST['txtdescuento'];
    $descuentoa = ($descuento/100) * $subtotal;
    $iva=19;
    $iva1 = ($iva / 100) * $subtotal;
    $total1 = $subtotal+$iva1;
    $total = $total1 - $descuentoa;

    // Insertar en la base de datos
    mysqli_query($conn, "INSERT INTO pedidosproductos (idpedidos, idproductos, cantidadpedidosproductos, precioumidadpedidosproductos, subtotalpedidosproductos, descuentopedidosproductos, IVApedidosproductos, totalpedidosproductos) VALUES('$pedido','$producto','$cantidad','$unidad','$subtotal','$descuento', '$iva','$total')");


    // Redireccionar a la página de índice después del registro exitoso
    header("Location: ../../../TroyaNW/ViewVendedor/pedidosproductos/index.php");
    exit();
}
?>
<html>
<head>
    <title>Pedidos Productos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
    <div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
            <table>
  <tr><th colspan="2">Nuevo Pedido Producto</th></tr>	

<tr>
<td>Id Pedido</td>
<td><input type="number" name="txtpedido" require></td>
</tr>
<tr>
<td>Id Producto</td>
<td><input type="number" name="txtproducto" require></td>
</tr>
<tr>
<td>Cantidad productos</td>
<td><input type="number" name="txtcantidad" require></td>
</tr>
<tr>
<td>Precio unidad</td>
<td><input type="number" name="txtunidad" require></td>
</tr>
<tr>
<td>Descuento</td>
<td><input type="number" name="txtdescuento" require></td>
</tr>
<tr>
<td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar?');">
                    </td>
</tr>

</table>
</form>
</div>
<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../pedidosproductos/index.php');
            // Redirigir a la nueva página
            window.location.replace('../pedidosproductos/index.php');
        }
    </script>
</body>
</html>