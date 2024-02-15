<?php

include_once("conexion.php");

$producto = $_GET['idpedidos'];

$querybuscar = mysqli_query($conn, "SELECT * FROM pedidosproductos WHERE idpedidos=$producto");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $pedido = $mostrar ['idpedidos'];
    $producto = $mostrar ['idproductos'];
    $cantidad = $mostrar ['cantidadpedidosproductos'];
    $unidad = $mostrar ['precioumidadpedidosproductos'];
    $descuento = $mostrar ['descuentopedidosproductos'];

}
?>
<html>
<head>
<title>Pedidos Productos</title>
<meta charset="UFT-8">
<link rel="stylesheet" href="../../estile2.css">
</head>

<body>
<div class="caja_popup2" id="formmodificar">
<form method="POST" class="contenedor_popup">
    <table>

<tr><th colspan="2">Modificar Pedido Producto</th></tr>
<tr>
    <td>Id pedido</td>
    <td><input type="number" name= "txtpedido" value="<?php echo $pedido;?>"
    required ></td>
</tr>
<tr>
    <td>Id Producto</td>
    <td><input type="number" name= "txtproducto" value="<?php echo $producto;?>"
    required ></td>
</tr>
<tr>
    <td>Cantidad productos</td>
    <td><input type="number" name= "txtcantidad" value="<?php echo $cantidad;?>"
    required ></td>
</tr>
<tr>
    <td>Precio unidad</td>
    <td><input type="number" name= "txtunidad" value="<?php echo $unidad;?>"
    required ></td>
</tr>
<tr>
    <td>Descuento</td>
    <td><input type="number" name= "txtdescuento" value="<?php echo $descuento;?>"
    required ></td>
</tr>
<tr>
<td colspan="2">
<input type = "button" value = "Cancelar" onclick = "history.back ()"> 
<input type="submit" name="btnmodificar" value="Modificar"
onClick="javascript: return confirm ('¿Deseas modificar a este pedido de producto?');">

</td>
</tr>
    </table>
</form>
</div>
</body>
</html>

<?php

 if(isset($_POST['btnmodificar']))
 {
    $pedido1 = $_POST['txtpedido'];
    $producto1 = $_POST['txtproducto'];
    $cantidad1 = $_POST['txtcantidad'];
    $unidad1 = $_POST['txtunidad']; 
    $subtotal1 = $unidad1 * $cantidad1;
    $descuento1 = $_POST['txtdescuento'];
    $descuentoap = ($descuento1/100) * $subtotal1;
    $iva1=19;
    $iva = ($iva1 / 100) * $subtotal1;
    $total2 = $subtotal1+$iva;
    $total1 = $total2 - $descuentoap;

    $querymodificar = mysqli_query($conn, "UPDATE pedidosproductos SET idproductos='$producto1', cantidadpedidosproductos='$cantidad1', precioumidadpedidosproductos='$unidad1', subtotalpedidosproductos='$subtotal1', descuentopedidosproductos='$descuento1', ivapedidosproductos='$iva1',totalpedidosproductos='$total1' WHERE idpedidos=$pedido1");

    echo "<script>window.location= 'index.php' </script>";





 }
 ?>