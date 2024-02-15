<?php

include_once("conexion.php");

?>
<htlm>
    <head>
        <title> Salidas </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
</head>
<?php
$currentPage = 'salidas'; 
?>
<body>
  
<div class="contenedor_iniciales">
    <?php include('../desplegables/desplegable_vendedor.php');?>
    </div>

    <div class="barrabuscar">
        <form method="POST">
            <input type="text" name="txtbuscar" class="cajabuscar"  placeholder="&#128270; Ingrese documento del cliente">
            <input type="submit" value="Buscar" name="btnbuscar" class="btnbuscar">
            </form></td>
</div>
</table>
            <table>
            <tr><th colspan="7"><h1>Salidas</h1><th><a class="a1" href="../../../TroyaNW/View_Vendedor/salidas/agregar.php"><img src="../../img/mas.svg"></a></th></tr>
            <tr>
 
            <th>ID</th>
            <th>ID producto</th>
            <th>N° venta</th>
            <th>Fecha</th>
            <th>Hora</th> 
            <th>Cantidad</th> 
            <th>Valor total</th> 
            <th>Acciones</th>
        </tr>
      

        <?php
        if(isset($_POST['btnbuscar']))
        {
            $buscar= $_POST['txtbuscar'];
            $querysalida = mysqli_query($conn, "SELECT salidas.idsalidas, producto.nombreproducto, ventas.numeroventas, salidas.fechasalidas, salidas.horsalidas, salidas.cantidadsalidas, salidas.valorsalidas FROM salidas, producto, ventas WHERE salidas.idproductos=producto.idproducto AND salidas.numeroventa = ventas.numeroventas AND salidas.idsalidas like'".$buscar."%'");
        } 
        else
        {
            $querysalida = mysqli_query($conn, "SELECT salidas.idsalidas, producto.nombreproducto, ventas.numeroventas, salidas.fechasalidas, salidas.horsalidas, salidas.cantidadsalidas, salidas.valorsalidas FROM salidas, producto, ventas WHERE salidas.idproductos=producto.idproducto AND salidas.numeroventa=ventas.numeroventas ORDER BY salidas.idsalidas ASC ");
            
        }
        $numerofila = 0;
        while ($mostrar = mysqli_fetch_array($querysalida)) 
        {
            $numerofila++;
            echo "<tr>";
            echo "<td>" . $mostrar['idsalidas'] ."</td>";
            echo "<td>" . $mostrar['nombreproducto'] ."</td>";
            echo "<td>" . $mostrar['numeroventas']."</td>";
            echo "<td>" . $mostrar['fechasalidas']."</td>";
            echo "<td>" . $mostrar['horsalidas']."</td>";
            echo "<td>" . $mostrar['cantidadsalidas']."</td>";
            echo "<td>" . $mostrar['valorsalidas']."</td>";
            echo "<td style='width=26%' colspan=2 ><a class=a1 href=\"editar.php?idsalidas=$mostrar[idsalidas]\"><img  src='../../img/editar.svg'></a> <a class=a1 href=\"eliminar.php?idsalidas=$mostrar[idsalidas]\" onClick=\"return confirm('¿desea eliminar a $mostrar[nombreproducto]?')\"><img src=../../img/trash.svg></a></td>";
                }
        ?>
        </table>
        <script>
        function abrirform() {
            document.getElementById("formregistrar").style.display = "block";
        }
        </script>
        
       
    </body>
    </html>