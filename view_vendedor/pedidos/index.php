<?php

include_once("conexion.php");

?>
<htlm>
    <head>
        <title> DASJEA </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
    

</head>
<?php
$currentPage = 'pedidos'; 
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
<tr><th colspan="5"><h1>Pedidos</h1>
<th><a class="a1" href="../../../TroyaNW/view_vendedor/pedidos/agregar.php"><img src="../../img/mas.svg"></a></th>
</tr>
<tr>
<th>Id</th>
<th>Documento Cliente</th>
<th>Fecha</th>
<th>Hora</th>
<th>Valor</th>
<th>Acciones</th>
</tr>
<?php

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST ['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT idpedidos, documentoCliente, fechapedidos, horapedidos, valorpedido	 FROM pedidos where documentoCliente like '".$buscar. "%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM pedidos ORDER BY idpedidos asc");
}
$numerofila = 0;
while($mostrar = mysqli_fetch_array($queryusuarios))
{ $numerofila++;
    echo "<tr>";
    echo "<td>" .$mostrar['idpedidos']."</td>";
    echo "<td>" .$mostrar['documentoCliente']."</td>";
    echo "<td>".$mostrar['fechapedidos']. "</td>";
    echo "<td>".$mostrar['horapedidos']. "</td>";   
    echo "<td>".$mostrar['valorpedido']. "</td>"; 
    echo "<td style='width=26%'><a class=a1 href=\"editar.php?idpedidos=$mostrar[idpedidos]\"><img  src='../../img/edita.svg'></a> <a class=a1 href =\"eliminar.php?idpedidos=$mostrar[idpedidos]\"
    onClick=\"return confirm('¿Estas seguro de eliminar a $mostrar[documentoCliente]?')\"><img src=../../img/delete.svg></a></td>";
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