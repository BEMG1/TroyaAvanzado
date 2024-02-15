<?php

include_once("conexion.php");

?>
<htlm>
    <head>
        <title> Vendedores </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
</head>
<?php
$currentPage = 'vendedores'; 
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
            <tr><th colspan="6"><h1>Vendedores</h1>  <th><a class="a1" href="../../../TroyaNW/admin/vendedores/agregar.php"><img src="../../img/mas.svg"></a></th></tr>

            <th>N°</th> 
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>N° Documento</th> 
            <th>Acciones</th>
        </tr>

        <?php
if(isset($_POST['btnbuscar']))
{
    $buscar= $_POST['txtbuscar'];
    $queryprovedor=mysqli_query($cone, "SELECT `idvendedores`, `nombrevendedores`, `Apellidovendedores`,`telefonovendedores`, `documentovendedores` FROM `vendedores` WHERE nombrevendedores LIKE'".$buscar."%'");
}
else{
$queryprovedor= mysqli_query($cone, "SELECT * FROM vendedores ORDER BY nombrevendedores ASC");
}
$numerofila=0;
while($mostrar = mysqli_fetch_array($queryprovedor))
{
    $numerofila++;
    echo "<tr>";
    echo "<td>".$numerofila."</td>";
    echo "<td>".$mostrar['idvendedores']."</td>";
    echo "<td>".$mostrar['nombrevendedores']."</td>";
    echo "<td>".$mostrar['Apellidovendedores']."</td>";
    echo "<td>".$mostrar['telefonovendedores']."</td>";
    echo "<td>".$mostrar['documentovendedores']."</td>";
    echo "<td style='width=26%'><a class=a1 href=\"editar.php?idvendedores=$mostrar[idvendedores]\"><img  src='../../img/edita.svg'></a> <a class=a1 href=\"eliminar.php?idvendedores=$mostrar[idvendedores]\"onClick=\"return confirm('¿Estas seguro de eliminar a $mostrar[nombrevendedores]?')\"><img src=../../img/delete.svg></a></td>";
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