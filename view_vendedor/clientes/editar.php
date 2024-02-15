<style>
  /* Estilos para el cuadro emergente */
  .info-popover {
    position: relative;
    display: inline-block;
  }

  .info-icon {
    font-size: 18px;
    color: black;
    cursor: pointer;
    position: absolute;
    left: 80px;
    top: 230px;

    
  }

  .info-content {
    display: none;
    position: absolute;
    top: 180px;
    left: 300px;
    width: 200px;
    background-color: #f0f0f0;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
  }

  .info-popover:hover .info-content {
    display: block;
  }
</style>
<?php

include_once("conexion.php");

$codigo = $_GET['documentoCliente'];

$querybuscar = mysqli_query($conn, "SELECT * FROM `cliente` WHERE documentoCliente=$codigo");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $tdocumento = $mostrar['idTipo_documento'];
    $doc = $mostrar['documentoCliente'];
    $apellidos = $mostrar['ApellidoCliente'];
    $direccion = $mostrar['direccionCliente'];
    $telefono = $mostrar['telefonoCliente'];
    $correo = $mostrar['emailCliente'];
    $sexo = $mostrar['idsexo'];
    $nombre =$mostrar['nombreCliente'];
}
?>
<html>
    <head>
        <title>EDITAR</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2.css">
    </head>
    <body>
    <div class="caja_popup2" id="formmodificar">
    <form method="POST" class="contenedor_popup">
   <?php include("../clientes/EditarProveedor.php")?>
    </form>
</html>
<?php

if(isset($_POST['btnmodificar']))
{
    
    $doc;
    $tipodocumento1 = $_POST['txttipo'];
    $nombre1 = $_POST['txtnombre'];
    $apellidos1 =$_POST['txtapellidos'];
    $direccion1 = $_POST['txtdireccion'];
    $telefono1 =$_POST['txttelefono'];
    $correo1= $_POST['txtcorreo'];

   $querymodificar = mysqli_query($conn, "UPDATE `cliente` SET `idTipo_documento`='$tipodocumento1',`nombreCliente`='$nombre1',`ApellidoCliente`='$apellidos1',`direccionCliente`='$direccion1',`telefonoCliente`='$telefono1',`emailCliente`='$correo1',`idsexo`='$sexo' WHERE `documentoCliente` = $doc;");
    echo"<script>window.location='index.php'</script>";
    
}
  