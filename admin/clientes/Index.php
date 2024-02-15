<?php

include_once("conexion.php");

?>
<htlm>
    <head>
        <title> Clientes </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
        <script src="../../js/script.js"></script>
</head>
<?php
$currentPage = 'clientes'; 
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
<tr><th colspan="9"><h1>Listar clientes</h1>
<th><a class="a1" href="../../../TroyaNW/admin/clientes/agregar.php"><img src="../../img/mas.svg"></a></th>
</tr>
<tr>
     <th>Nro</th>
     <th>Numero de documento</th>
     <th>Tipo de documento</th>
     <th>Nombre</th>
     <th>Apellido</th>
     <th>direccion</th>
     <th>telefono</th>
     <th>Correo electronico</th>
     <th>Sexo</th>
     <th>Acciones</th></tr>
<?php
if(isset($_POST['btnbuscar']))
{
    $buscar=$_POST['txtbuscar'];
    $queryclientes = mysqli_query($conn, "SELECT cliente.documentoCliente, tipo_documento.nombredocumento, cliente.nombreCliente, cliente.ApellidoCliente, cliente.direccionCliente, cliente.telefonoCliente, cliente.emailCliente, sexo.nombresexol FROM cliente, tipo_documento, sexo WHERE cliente.idTipo_documento = tipo_documento.idTipo_documento AND cliente.idsexo = sexo.idsexo AND documentoCliente like '".$buscar."%'");
}
else
{
    $queryclientes = mysqli_query($conn, "SELECT cliente.documentoCliente, tipo_documento.nombredocumento, cliente.nombreCliente, cliente.ApellidoCliente, cliente.direccionCliente, cliente.telefonoCliente, cliente.emailCliente, sexo.nombresexol FROM cliente, tipo_documento, sexo WHERE cliente.idTipo_documento = tipo_documento.idTipo_documento AND cliente.idsexo = sexo.idsexo ORDER BY 'documentoCliente' asc");
}
$numerofila = 0;
while($mostrar = mysqli_fetch_array($queryclientes))
{
     include("index/Mostrar.php");
}
?>
</table>
<script>
    function abrirform () {
        document.getElementById("formregistrar").style.display = "block";
 }

</script>
</div>
</body>
</html>