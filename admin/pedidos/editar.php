<?php

include_once("conexion.php");

$pedido = $_GET['idpedidos'];

$querybuscar = mysqli_query($conn, "SELECT * FROM pedidos WHERE idpedidos=$pedido");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $pedido = $mostrar ['idpedidos'];
    $documento = $mostrar ['documentoCliente'];
    $fecha = $mostrar ['fechapedidos'];
    $hora = $mostrar ['horapedidos'];
    $valor = $mostrar ['valorpedido'];
}
?>
<html>
<head>
<title>Pedidos</title>
<meta charset="UFT-8">
<link rel="stylesheet" href="../../estile2_7.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
<div class="caja_popup2" id="formmodificar">
<form method="POST" class="contenedor_popup">
    <table>

<tr><th colspan="2">Modificar pedido</th></tr>
<tr>
    <td>Documento</td>
    <td><select name="txtdocumento" id="opciones3" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
</tr>
<tr>
    <td>Valor</td>
    <td><input type="number" name= "txtvalor" value="<?php echo $valor;?>"
    required ></td>
</tr>
<tr>
<td colspan="2">
<input type = "button" value = "Cancelar" onclick = "history.back ()"> 
<input type="submit" name="btnmodificar" value="Modificar"
onClick="javascript: return confirm ('¿Deseas modificar a este pedido?');">

</td>
</tr>
    </table>
</form>
</div>
<script>
     $(document).ready(function () {
    function obtenerOpciones() {
        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesCliente.php', // Ruta a tu script PHP en el servidor
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opciones3');
                opcionesSelect.empty();

                // Agrega la opción predeterminada
                opcionesSelect.append('<option value="">Seleccione...</option>');

                // Si hay opciones, las muestra
                if (data.length > 0) {
                    data.forEach(function (opcion) {
                        opcionesSelect.append('<option value="' + opcion + '">' + opcion + '</option>');
                    });
                }
            },
            error: function (error) {
                console.error('Error al obtener opciones desde la base de datos:', error);
            }
        });
    }

    // Llamada inicial para cargar las opciones al cargar la página
    obtenerOpciones();

    // Manejador de eventos cuando cambia el valor del campo opciones
    $('#opciones3').on('change', function () {
        var idproductos = $(this).val();

        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesCliente.php', // Ruta a tu script PHP en el servidor
            data: { idproducto: idproductos },
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opcionesC');
                opcionesSelect.empty();

                // Si hay opciones, las muestra
                if (data.length > 0) {
                    opcionesSelect.show();
                    data.forEach(function (opcion) {
                        opcionesSelect.append('<option value="' + opcion + '">' + opcion + '</option>');
                    });
                } else {
                    // Si no hay opciones, oculta el select
                    opcionesSelect.hide();
                }
            },
            error: function (error) {
                console.error('Error al obtener opciones desde la base de datos:', error);
            }
        });
    });

});
</script>
</body>
</html>

<?php

 if(isset($_POST['btnmodificar']))
 {
    $pedidos1 = $pedido;
    $documento1 = $_POST['txtdocumento'];
    $valor1 = $_POST['txtvalor'];

    $querymodificar = mysqli_query($conn, "UPDATE pedidos SET documentoCliente='$documento1',valorpedido='$valor1' WHERE idpedidos=$pedidos1");

    echo "<script>window.location= 'index.php' </script>";

 }
 ?>