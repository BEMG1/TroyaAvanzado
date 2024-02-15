<?php
include ("../../controller/ValidarSesion.php"); 
include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se ha enviado el formulario, procesar la información
    $documento = $_POST['txtdocumento'];

     // Verifica si se ha seleccionado una opción válida
     if (empty($documento) || $documento == "Seleccione...") {
        echo "Error: Por favor, seleccione una opción válida.";
        exit();
    }
    $valor = $_POST['txtvalor'];

    // Insertar en la base de datos
    mysqli_query($conn, "INSERT INTO pedidos( documentoCliente, fechapedidos, horapedidos, valorpedido) VALUES('$documento',CURRENT_DATE,CURRENT_TIME,'$valor')");

    // Redireccionar a la página de índice después del registro exitoso
    header("Location: ../../../TroyaNW/admin/pedidos/index.php");
    exit();
}
?>
<html>
<head>
    <title>Pedidos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="caja_popup2" id= "formregistrar">
<form class="contenedor_popup" method="post" action="agregar.php">
<table>
  <tr><th colspan="2"><H1>Nuevo Pedido</H1></th></tr>	
<tr>
<td>Documento cliente</td>
<td><select name="txtdocumento" id="opciones3" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
</tr>
<tr>
<tr>
<td>Valor Pedido</td>
<td><input type="number" name="txtvalor" require></td>
</tr>
<tr>
<td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a este pedido?');">
                    </td>
</tr>

</table>
</form>
</div>
<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../pedidos/index.php');
            // Redirigir a la nueva página
            window.location.replace('../pedidos/index.php');
        }

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