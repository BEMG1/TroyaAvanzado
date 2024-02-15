<?php

include_once("conexion.php");

$codigo = $_GET['documentoProveedor'];

$querybuscar = mysqli_query($cone, "SELECT * FROM `proveedor` WHERE documentoProveedor=$codigo");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $documento = $mostrar['documentoProveedor'];
    $tipo = $mostrar['idtipo_documento'];
    $nombre = $mostrar['nombreProveedor'];
    $telefono = $mostrar['telefonoProveedor'];
    $direccion = $mostrar['direccionProveedor'];
    $correo = $mostrar['correoProveedor'];
}
?>
<html>
    <head>
        <title>Editar</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
    </head>
    <body>
    <div class="caja_popup2" id="formmodificar">
    <form method="POST" class="contenedor_popup">
   <?php include("contenidos/EditarProveedor.php")?>
    </form>
</html>
<?php

if(isset($_POST['btnmodificar']))
{
    
    $documento1 = $documento;
    $tipo1 = $_POST['txttipodocumento'];
    $nombre1 = $_POST['txtnombre'];
    $telefono1 = $_POST['txttel'];
    $direccion1 = $_POST['txtdireccion'];
    $correo1 = $_POST['txtcorreo'];
    $querymodificar = mysqli_query($cone, "UPDATE proveedor SET idtipo_documento='$tipo1',nombreProveedor='$nombre1',telefonoProveedor='$telefono1',direccionProveedor='$direccion1',correoProveedor='$correo1' WHERE documentoProveedor='$documento1'");
    

     
echo"<script>window.location='index.php'</script>";
}
  