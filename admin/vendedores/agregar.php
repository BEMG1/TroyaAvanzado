<?php 
include_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['txtidvendedor'];
$nombre = $_POST['txtnomvendedor'];
$apellido = $_POST['txtapellido'];
$telefono = $_POST['txttelvendedor'];
$doc = $_POST['txtdocvendedor'];

mysqli_query($cone, "INSERT INTO vendedores (idvendedores, nombrevendedores,Apellidovendedores, telefonovendedores, documentovendedores) VALUES ('$id','$nombre','$apellido','$telefono','$doc')");

header("Location: ../../../TroyaNW/admin/vendedores/index.php");
exit();
}
?>
<html>
<head>
    <title>Vendedores</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
    <div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
<table>
<tr><th colspan="2"><h1> Crear Vendedor</h1> </th></tr>
<tr><td>ID</td><td><input type="number" name="txtidvendedor" size="30" style="width:120px" maxlength="50"></td></tr>
            <td>Nombre</td><td><input type="text" name="txtnomvendedor" size="30" style="width:100px" maxlength="20"></td></tr>
            <td>Apellido</td><td><input type="text" name="txtapellido" size="30" style="width:100px" maxlength="20"></td></tr>
            <td>Telefono</td><td><input type="number" name="txttelvendedor" size="30" style="width:130px" maxlength="50"></td></tr>
            <td>Nº Documento</td><td><input type="number" name="txtdocvendedor" size="30" style="width:100px" maxlength="50"></th></tr>
            <tr><td colspan="2">
            <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a este vendedor?');"></tr></td>
</table>  
<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../vendedores/index.php');
            // Redirigir a la nueva página
            window.location.replace('../vendedores/index.php');
        }
    </script>
</body>
</html>