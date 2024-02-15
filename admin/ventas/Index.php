<?php

include_once("conexion.php");

?>
<htlm>
    <head>
        <title> Ventas </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
</head>
<?php
$currentPage = 'ventas'; 
?>
<body>
  
<div class="contenedor_iniciales">
    <?php include('../desplegables_admin/desplegable_proveedor1_1.php');?>
    </div>

    <div class="barrabuscar">
        <form method="POST">
            <input type="text" name="txtbuscar" class="cajabuscar"  placeholder="&#128270; Ingrese documento del cliente">
            <input type="submit" value="Buscar" name="btnbuscar" class="btnbuscar">
            </form></td>
</div>
<table>
<tr><th colspan="7"><h1>Ventas</h1><th><a class="a1" href="../../../TroyaNW/admin/ventas/agregar.php"><img src="../../img/mas.svg"></a></th></tr>
<th>Nro ventas</th>
<th>Id pedido</th>
<th>Fecha </th>
<th>Hora </th>
<th>Subtotales</th>
<th>IVA</th>
<th>Total</th>
<th>Acciones</th>

<?php
if(isset($_POST['btnbuscar']))
{
    $buscar=$_POST['txtbuscar'];
    $queryclientes = mysqli_query($conn, "SELECT `numeroventas`, `idpedidos`, `fechaventas`, `horaventas`, `subtotalventas`, `ivaventas`, `totalventas` FROM `ventas` WHERE numeroventas LIKE '".$buscar."%'");
}
else
{
    $queryclientes = mysqli_query($conn, "SELECT * FROM `ventas` ORDER BY 'numeroventas' asc");
}
$numerofila = 0;
while($mostrar = mysqli_fetch_array($queryclientes))
{
    $numerofila++;
         echo"<tr>";
         echo"<td>".$mostrar['numeroventas']."</td>";
         echo"<td>".$mostrar['idpedidos']."</td>";
         echo"<td>".$mostrar['fechaventas']."</td>";
         echo"<td>".$mostrar['horaventas']."</td>";
         echo"<td>".$mostrar['subtotalventas']."</td>";
         echo"<td>".$mostrar['ivaventas']."</td>";
         echo"<td>".$mostrar['totalventas']."</td>";
         echo "<td><a class=a1 href=\"editar.php?numeroventas=$mostrar[numeroventas]\"><img  src='../../img/edita.svg'></a> <a class=a1 href=\"eliminar.php?numeroventas=$mostrar[numeroventas]\" onClick=\"return confirm('¿Estas seguro de eliminar a $mostrar[numeroventas]?')\"><img src=../../img/delete.svg></a>"?></th>
         <?php 
         echo "</td></tr>";
}
?>
</table>
<script>
    function abrirform () {
        document.getElementById("formregistrar").style.display = "block";
 }

</script>
</body>
</html>