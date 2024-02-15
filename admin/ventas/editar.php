<?php

include_once("conexion.php");

$cod = $_GET['numeroventas'];

$querybuscar = mysqli_query($conn, "SELECT * FROM `ventas` WHERE numeroventas=$cod");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $nventas = $mostrar['numeroventas'];
    $idpedido = $mostrar['idpedidos'];
    $fecha = $mostrar['fechaventas'];
    $Hora = $mostrar['horaventas'];
    $Subtotal = $mostrar['subtotalventas'];
    $iva = $mostrar['ivaventas'];
    $Tot = $mostrar['totalventas'];
}
?>
<html>
    <head>
        <title>DASJEA</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2.css">
    </head>
    <body>
    <div class="caja_popup2" id="formmodificar">
    <form method="POST" class="contenedor_popup">
   <?php include("../ventas/EditarProveedor.php")?>
    </form>
</html>
<?php

if(isset($_POST['btnmodificar']))
{
    
    $pedido1 = $_POST['txtpedido'];
    $subtotal1 = $_POST['txtsubtotal'];
    $ivaPorcentaje1 = 19;
    $iva1 = ($ivaPorcentaje1 / 100) * $subtotal1;
    $Total1 = $subtotal1 + $iva1; 
    $querymodificar = mysqli_query($conn, "UPDATE ventas set `idpedidos`='$pedido1',`subtotalventas`='$subtotal1',`totalventas`='$Total1 ' WHERE numeroventas='$nventas'");
    echo"<script>window.location='index.php'</script>";
    

     
echo"<script>window.location='index.php'</script>";
}
  