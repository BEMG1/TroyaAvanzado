<?php 
include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$Nventas = $_POST['Nventas'];
$Idpedido = $_POST['Idpedido'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$subtotal = $_POST['subtotal'];
$ivaPorcentaje = 19;
$iva = ($ivaPorcentaje / 100) * $subtotal;
$Total = $subtotal + $iva; 

mysqli_query($conn, "INSERT INTO `ventas`(`numeroventas`, `idpedidos`, `fechaventas`, `horaventas`, `subtotalventas`, `IVAventas`, `totalventas`) VALUES ('$Nventas','$Idpedido',CURRENT_DATE, CURRENT_TIME,'$subtotal','$ivaPorcentaje','$Total')");
header("Location: ../../../TroyaNW/View_Vendedor/ventas/index.php");
exit();
}
 ?>

<html>
<head>
    <title>ventas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
<div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
<table>
    <tr><th colspan="5">Nueva venta</th></tr>
<form>
<tr>
   <td> Numero venta</td>
   <td><input type="number" name="Nventas"></td>
</tr>
<tr>
   <td>Id Pedido</td>
   <td><input type="number" name="Idpedido"></td>
   
</tr>
<tr>
    <td> Subtotal venta</td>
    <td><input type="number" name="subtotal"></td> 
</tr>
<tr>
    <td colspan="5">
    <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a esta venta?');">
    </td>
    </form>
</table>
<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../ventas/index.php');
            // Redirigir a la nueva página
            window.location.replace('../ventas/index.php');
        }
    </script>
</body>
</html>