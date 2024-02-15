<?php

include_once("conexion.php");


$idsalidas = $_GET['idsalidas'];

$querybuscar = mysqli_query($conn, "SELECT * FROM salidas WHERE idsalidas=$idsalidas");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id_salidas=$mostrar['idsalidas'];
   $id_producto=$mostrar['idproductos'];
   $n_ventas=$mostrar['numeroventa'];
   $c_salidas=$mostrar['cantidadsalidas'];
   $v_salidas=$mostrar['valorsalidas'];
}
?>
<html>
    <head>
        <title> Salidas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2.css">
    </head>
    <body>
    <div class="caja_popup2" id="formmodificar">
    <form method="POST" class="contenedor_popup">
        <table>
            <tr><th colspan="2">Modificar salidas</th></tr>
            <tr >
                        <td>ID Salida</td>
                        <td ><input type="number" name="txtidsal" value="<?php echo $id_salidas;?>" require></td>
                    </tr>
                    <tr>
                        <td>ID producto</td>
                        <td><input type="number" name="txtidpro" value="<?php echo $id_producto;?>" required></td>
                    </tr>
                    <tr>
                        <td>numero de venta</td>
                        <td><input type="number" name="txtnventa" value="<?php echo $n_ventas;?>" required></td>
                    </tr>
                    <tr>
                    <td>cantidad de salida</td>
                        <td ><input type="number" name="txtcsal" value="<?php echo $c_salidas;?>" required></td>
                    </tr>
                    <tr>
                        <td>valor de salida</td>
                        <td><input type="number" name="txtvsal" value="<?php echo $v_salidas;?>" required></td>
                    </tr>
                    <tr>
            <td colspan="2">
            <input type = "button" value = "Cancelar" onclick = "history.back ()"> 
                <input type="submit" name="btnmodificar" value="modificar" onClick="Javascript: return confirm('¿deseas modificar esta salida?');"></td>
                </tr>
            </table>
    </form>
    </body>
</html>
<?php
if(isset($_POST['btnmodificar']))
{
    $id_salidas1=$_POST['txtidsal'];
    $id_producto1=$_POST['txtidpro'];
    $n_ventas1=$_POST['txtnventa'];
    $c_salidas1=$_POST['txtcsal'];
    $v_salidas1=$_POST['txtvsal'];

    $querymodificar = mysqli_query($conn, "UPDATE salidas SET  idsalidas='$id_salidas1', idproductos='$id_producto1', numeroventa='$n_ventas1',cantidadsalidas='$c_salidas1', valorsalidas='$v_salidas1' WHERE idsalidas= $idsalidas");

    echo"<script>window.location='index.php'</script>";
}
?>