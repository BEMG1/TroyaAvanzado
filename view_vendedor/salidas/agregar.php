<?php

include_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id_salidas=$_POST['txtidsal'];
   $id_producto=$_POST['txtidpro'];
   $n_ventas=$_POST['txtnventa'];
   $c_salidas=$_POST['txtcsal'];
   $v_salidas=$_POST['txtvsal'];
   

   mysqli_query($conn, "INSERT  INTO salidas (idsalidas, idproductos, numeroventa, fechasalidas, horsalidas, cantidadsalidas, valorsalidas) VALUES 
   ('$id_salidas','$id_producto','$n_ventas',CURRENT_DATE,CURRENT_TIME,'$c_salidas','$v_salidas')");

 
header("Location: ../../../TroyaNW/View_Vendedor/salidas/index.php");
exit();
}
?>
<html>
<head>
    <title>Salidas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
<div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
                <table>
                    <tr><th colspan="2"> Nueva salida </th></tr>
                    <tr>
                        <td>ID de Salida</td>
                        <td><input type="number" name="txtidsal" required></td>
                    </tr>
                    <tr>
                        <td>ID de producto</td>
                        <td><input type="number" name="txtidpro" required></td>
                    </tr>
                    <tr>
                        <td>Numero de venta</td>
                        <td><input type="number" name="txtnventa" required></td>
                    </tr>

                    <tr>
                        <td>Cantidad de salidas</td>
                        <td><input type="number" name="txtcsal" required></td>
                    </tr>
                    <tr>
                        <td>Valor salidas</td>
                        <td><input type="number" name="txtvsal" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a esta salida?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../salidas/index.php');
            // Redirigir a la nueva página
            window.location.replace('../salidas/index.php');
        }
    </script>
</body>
</html>