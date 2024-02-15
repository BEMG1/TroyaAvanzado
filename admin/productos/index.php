<?php

include_once("conexion.php");

?>
<htlm>
    <head>
        <title> Productos </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
       

</head>
<?php
$currentPage = 'productos'; 
?>
<body>
<div class="contenedor_iniciales">
    <?php include('../desplegables_admin/desplegable_proveedor1_1.php');?>
    </div>

    <div class="barrabuscar">
        <form method="POST">
            <input type="text" name="txtbuscar" class="cajabuscar"  placeholder="&#128270; Ingrese el nombre del producto">
            <input type="submit" value="Buscar" name="btnbuscar" class="btnbuscar">
            </form></td>
</div>  
<table>
<tr><th colspan="9"><h1>Productos</h1>
<th><a class="a1" href="../../../TroyaNW/admin/productos/agregar.php"><img src="../../img/mas.svg"></a></th></tr>

<tr>
<th>Id</th>
<th>Nombre</th>
<th>Categoria</th>
<th>Salidas</th>
<th>Entradas</th>
<th>Stock</th>
<th>Valor</th>
<th>IVA</th>
<th>Proveedor</th>
<th>Acciones</th>
</tr>
<?php

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST ['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT producto.idproducto, producto.nombreproducto, categorias.nombrecategorias, producto.salidaproducto, producto.entradaproducto, producto.stockproducto, FORMAT(producto.valorproducto, 'NO') AS valorproducto, producto.IVAproducto, proveedor.nombreProveedor FROM producto, proveedor, categorias WHERE producto.idcategoria=categorias.idcategorias AND producto.documentoproveedor=proveedor.documentoProveedor AND nombreproducto like '".$buscar. "%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT producto.idproducto, producto.nombreproducto, categorias.nombrecategorias, producto.salidaproducto, producto.entradaproducto, producto.stockproducto, FORMAT(producto.valorproducto, 'NO') AS valorproducto, producto.IVAproducto, proveedor.nombreProveedor FROM producto, proveedor, categorias WHERE producto.idcategoria=categorias.idcategorias AND producto.documentoproveedor=proveedor.documentoProveedor ORDER BY idproducto asc");
}
$numerofila = 0;
while($mostrar = mysqli_fetch_array($queryusuarios))
{ $numerofila++;
    echo "<tr>";
    echo "<td>" .$mostrar['idproducto']."</td>";
    echo "<td>" .$mostrar['nombreproducto']."</td>";
    echo "<td>".$mostrar['nombrecategorias']. "</td>";
    echo "<td>".$mostrar['salidaproducto']. "</td>";   
    echo "<td>".$mostrar['entradaproducto']. "</td>"; 
    echo "<td>" .$mostrar['stockproducto']."</td>";
    echo "<td>".$mostrar['valorproducto']. "</td>";
    echo "<td>".$mostrar['IVAproducto']. "</td>";   
    echo "<td>".$mostrar['nombreProveedor']. "</td>"; 
    echo "<td style='width=26%'><a class=a1 href=\"editar.php?idproducto=$mostrar[idproducto]\"><img  src='../../img/edita.svg'></a> <a class=a1 href =\"eliminar.php?idproducto=$mostrar[idproducto]\"
    onClick=\"return confirm('¿Estas seguro de eliminar a $mostrar[nombreproducto]?')\"><img src=../../img/delete.svg></a></td>";
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