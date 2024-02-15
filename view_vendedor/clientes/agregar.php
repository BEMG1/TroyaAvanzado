<?php 
include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST['Ndocumento'];
    $tdocumento = $_POST['txtdocumento'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['Sexo'];
    $correo = $_POST['correo'];


mysqli_query($conn, "INSERT INTO `cliente`(`documentoCliente`, `idTipo_documento`, `nombreCliente`, `ApellidoCliente`, `direccionCliente`, `telefonoCliente`, `emailCliente`, `idsexo`) VALUES ('$numero','$tdocumento','$nombre','$apellidos','$direccion','$telefono','$correo','$sexo')");

header("Location: ../../../TroyaNW/ViewVendedor/clientes/index.php");
exit();

}
 ?>

<html>
<head>
    <title>Clientes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
<div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
        <table>
        <tr>
        <th colspan="5">Nuevo cliente</th></tr>
        <tr>
        <td> Numero de documento </td><td><input type="number" name="Ndocumento" style="width:170px;" required></td>
        <tr></tr>
   <td>Tipo de documento</td>
   <td><select name="txtdocumento" style="width:170px;" required>
                    <option>Seleccione...</option>
                    <option value="1">T.I</option>
                    <option value="2">C.C</option>
                    <option value="3">C.E</option>
                    <option value="4">RUT</option>
                    <option value="5">NIT</option>
        </select><p></td>
        <tr>
        <td>Nombre</td><td><input type= "text" name="nombre" style="width:170px;" required></td><tr>
        <td> Apellido</td><td><input type= "text" name="apellido" style="width:170px;" ></td><tr>
<td> Direccion</td><td><input type="text" name="direccion" style="width:170px;" required></td><tr>
<td> Telefono</td><td><input type="number" name="telefono" style="width:170px;" required></td><tr>
<tr> 
    <td>Sexo</td>
    <td><select name="Sexo" style="width:170px;" required>
    <option>Seleccione...</option>   
    <option value="1">Femenino</option>
    <option value="2">Masculino</option>
    </select></td><tr>
        <td> Correo electronico </td><td><input type="email" value="@" name="correo"></td>
    </tr>

    <tr>
    <td colspan="5">
        <button type="button" onclick="cancelarFormulario()">Cancelar</button>
        <input type="submit" name="btnregistrar" vale="registrar" onClick="Javascript: return confirm('¿deseas registar a este cliente?');">
    </td>
    </table>
</form>
</div>

<script>
     function cancelarFormulario() {
            window.history.replaceState(null, null, '../clientes/index.php');
            // Redirigir a la nueva página
            window.location.replace('../clientes/index.php');
        }
    </script>
</body>
</html>

