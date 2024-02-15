<?php

include_once("conexion.php");

$pedido = $_GET['idpedidos'];

$querybuscar = mysqli_query($conn, "SELECT * FROM pedidos WHERE idpedidos=$pedido");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $pedido = $mostrar ['idpedidos'];
    $documento = $mostrar ['documentoCliente'];
    $fecha = $mostrar ['fechapedidos'];
    $hora = $mostrar ['horapedidos'];
    $valor = $mostrar ['valorpedido'];
}
?>
<html>
<head>
<title>Pedidos</title>
<meta charset="UFT-8">
<link rel="stylesheet" href="../../estile2.css">
</head>

<body>
<div class="caja_popup2" id="formmodificar">
<form method="POST" class="contenedor_popup">
    <table>

<tr><th colspan="2">Modificar pedido</th></tr>
<tr>
    <td>Id pedido</td>
    <td><input type="number" name= "txtpedido" value="<?php echo $pedido;?>"
    required ></td>
</tr>
<tr>
    <td>Documento</td>
    <td><input type="number" name= "txtdocumento" value="<?php echo $documento;?>"
    required ></td>
</tr>

<tr>
    <td>Valor</td>
    <td><input type="number" name= "txtvalor" value="<?php echo $valor;?>"
    required ></td>
</tr>
<tr>
<td colspan="2">
<input type = "button" value = "Cancelar" onclick = "history.back ()"> 
<input type="submit" name="btnmodificar" value="Modificar"
onClick="javascript: return confirm ('¿Deseas modificar a este pedido?');">

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
    $pedidos1 = $_POST['txtpedido'];
    $documento1 = $_POST['txtdocumento'];
    $valor1 = $_POST['txtvalor'];

    $querymodificar = mysqli_query($conn, "UPDATE pedidos SET documentoCliente='$documento1',valorpedido='$valor1' WHERE idpedidos=$pedidos1");

    echo "<script>window.location= 'index.php' </script>";





 }
 ?>