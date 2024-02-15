<?php

include_once("conexion.php");
?>

<html>
<head>
<title>Pedidos Productos</title>
<meta charset= "UTF-8">
<link rel="stylesheet" href="../../estile2_7.css">
</head>
<?php
$currentPage = 'pedidosproductos'; 
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
<table>
<tr><th colspan="8"><h1>Pedidos Productos</h1>
<th><a class="a1" href="../../../TroyaNW/view_vendedor/pedidosproductos/agregar.php"><img src="../../img/mas.svg"></a></th>
</tr>
<tr>
<th>Id pedidos</th>
<th>Id productos</th>
<th>Cantidad producto</th>
<th>Precio unitario</th>
<th>Subtotal</th>
<th>Descuentos</th>
<th>IVA</th>
<th>Total</th>
<th>Acciones</th>
</tr>
<?php

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST ['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT pedidosproductos.idpedidos,  producto.nombreproducto, pedidosproductos.cantidadpedidosproductos, pedidosproductos.precioumidadpedidosproductos, pedidosproductos.subtotalpedidosproductos, pedidosproductos.descuentopedidosproductos, pedidosproductos.ivapedidosproductos, pedidosproductos.totalpedidosproductos  FROM pedidosproductos, producto WHERE producto.idproducto=pedidosproductos.idproductos AND producto.nombreproducto like '".$buscar. "%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT pedidosproductos.idpedidos,  producto.nombreproducto, pedidosproductos.cantidadpedidosproductos, pedidosproductos.precioumidadpedidosproductos, pedidosproductos.subtotalpedidosproductos, pedidosproductos.descuentopedidosproductos, pedidosproductos.ivapedidosproductos, pedidosproductos.totalpedidosproductos  FROM pedidosproductos, producto WHERE producto.idproducto=pedidosproductos.idproductos ORDER BY idpedidos asc");
}
$numerofila = 0;
while($mostrar = mysqli_fetch_array($queryusuarios))
{ $numerofila++;
    echo "<tr>";
    echo "<td>" .$mostrar['idpedidos']."</td>";
    echo "<td>" .$mostrar['nombreproducto']."</td>";
    echo "<td>" .$mostrar['cantidadpedidosproductos']. "</td>";
    echo "<td>" .$mostrar['precioumidadpedidosproductos']. "</td>";   
    echo "<td>" .$mostrar['subtotalpedidosproductos']. "</td>"; 
    echo "<td>" .$mostrar['descuentopedidosproductos']. "%</td>"; 
    echo "<td>" .$mostrar['ivapedidosproductos']. "</td>"; 
    echo "<td>" .$mostrar['totalpedidosproductos']. "</td>"; 
    echo "<td style='width=26%'><a class=a1 href=\"editar.php?idpedidos=$mostrar[idpedidos]\"><img  src='../../img/edita.svg'></a> <a class=a1 href =\"eliminar.php?idpedidos=$mostrar[idpedidos]\"
    onClick=\"return confirm('¿Estas seguro de eliminar a $mostrar[idpedidos]?')\"><img src=../../img/delete.svg></a></td></tr>";
}
?>
</table>
<script>
function abrirform(){
  document.getElementById("formregistrar").style.display = "block";

}


</script>
</body>
</html>