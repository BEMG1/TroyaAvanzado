<?php

include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se ha enviado el formulario, procesar la información
    $documento = $_POST['txtdocumento'];
    $tipo = $_POST['txttipodocumento'];
    $nombre = $_POST['txtnombre'];
    $telefono = $_POST['txttel'];
    $direccion = $_POST['txtdireccion'];
    $correo = $_POST['txtcorreo'];


    // Insertar en la base de datos
    mysqli_query($cone, "INSERT INTO proveedor (documentoProveedor, idTipo_documento, nombreProveedor, telefonoProveedor, direccionProveedor, correoProveedor) VALUES ('$documento','$tipo','$nombre','$telefono','$direccion','$correo')");

    // Redireccionar a la página de índice después del registro exitoso
    header("Location: ./index.php");
    exit();
}
?>

<html>
<head>
    <title>Proveedor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
</head>
<body>
    <div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
            <table>
<tr>
    <th colspan="2"><h1> Crear Proveedor</h1> </th>
</tr>
            <tr>
                <td>Documento Provedor</td>
                <td><input type="number" name="txtdocumento" size="30" style="width:120px" maxlength="50" required></td>
            </tr>
            <td>Tipo Documento</td>
            <td>
                <select name="txttipodocumento" style="width:120px;" required>
                    <option>Seleccione...</option>
                    <option value="1">T.I</option>
                    <option value="2">C.C</option>
                    <option value="3">C.E</option>
                    <option value="4">RUT</option>
                    <option value="5">NIT</option>
                </select>
        </td>
        </tr>
            <td>Nombre</td>
            <td><input type="text" name="txtnombre" size="30" style="width:120px" maxlength="50" required></td>
        </tr>
            <td>Telefono</td>
            <td><input type="number" name="txttel" size="30" style="width:120px" maxlength="50" required></td>
        </tr>
            <td>Direccion</td>
            <td><input type="text" name="txtdireccion" size="30" style="width:120px" maxlength="50" required></th>
        </tr>
            <td>Correo</td>
            <td><input type="email" name="txtcorreo" value="@" size="30" style="width:120px" maxlength="50" required></td>
        </tr>
            <tr>
            <td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a este proveedor?');">
                    </td>
</tr>
</table>
</form>
</div>
<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../proveedor/index.php');
            // Redirigir a la nueva página
            window.location.replace('../proveedor/index.php');
        }
    </script>
</body>
</html>