<?php

include_once("conexion.php");

$cod = $_GET['idvendedores'];

$querybuscar = mysqli_query($cone, "SELECT * FROM vendedores WHERE idvendedores=$cod");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id = $mostrar['idvendedores'];
    $nombre = $mostrar['nombrevendedores'];
    $apellido = $mostrar['Apellidovendedores'];
    $telefono = $mostrar['telefonovendedores'];
    $doc = $mostrar['documentovendedores']; 
}
?>
<html>
    <head>
        <title> Vendedores</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2.css">
    </head>
    <body>
    <div class="caja_popup2" id="formmodificar">
    <form method="POST" class="contenedor_popup">
    <table>
<tr><th colspan="2"><h1> Editar Vendedor</h1> </th></tr>
<tr><td>ID</td><td><input type="number" name="txtidvendedor" value="<?php echo $id;?>" ></td></tr>
            <td>Nombre</th><td><input type="text" name="txtnomvendedor" value="<?php echo $nombre;?>" ></td></tr>
            <td>Apellido</th><td><input type="text" name="txtapellido" value="<?php echo $apellido;?>" ></td></tr>
            <td>Telefono</th><td><input type="number" name="txttelvendedor" value="<?php echo $telefono;?>" ></td></tr>
            <td>Nº Documento</td><td><input type="number" name="txtdocvendedor" value="<?php echo $doc;?>" ></td></tr>
            <td colspan="2">
             <input type = "button" value = "Cancelar" onclick = "history.back ()"> 
                <input type="submit" name="btnmodificar" value="Modificar" onClick="Javascript: return confirm('¿deseas modificar a este vendedor?');"></td></tr></table>
</form>
</body>
</html>
<?php

if(isset($_POST['btnmodificar']))
{
   $id1 = $_POST['txtidvendedor'];
        $nombre1 = $_POST['txtnomvendedor'];
        $apellido1 = $_POST['txtapellido'];
        $telefono1 = $_POST['txttelvendedor'];
        $doc1 = $_POST['txtdocvendedor'];  
        
        $querymodificar = mysqli_query($cone, "UPDATE vendedores SET nombrevendedores='$nombre1', Apellidovendedores='$apellido1', telefonovendedores='$telefono1',documentovendedores='$doc1' WHERE idvendedores='$id1'");

     
echo"<script>window.location='index.php'</script>";
}